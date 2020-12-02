<?php


function redirect_to( $url )
{
    header( "Location: {$url}" );
    exit;
}

function unsetSession( $text = '' )
{
    if ( isset( $_SESSION[ $text ] ) ) {
        unset( $_SESSION[ $text ] );
    }
}

function destroySession( )
{
    session_destroy();
}

function echoError( $text = "" )
{
    echo "<span class='redMsg'> {$text} </span>";
}

function echoln( $text = "" )
{
    echo "{$text} <br/>";
}

function echoln2( $text = "" )
{
    echo "{$text} <br/><br/>";
}

function escapeString( $text )
{
    global $connection;
    return mysqli_real_escape_string( $connection, $text );
}

function initialiseDB( )
{
    $dbhost     = "127.0.0.1";
    $dbuser     = "root";
    $dbpass     = "";
    $dbname     = "2102_travel";
    $connection = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );

    if ( mysqli_connect_errno() ) {
        die( "Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ") " );
    }

    return $connection;
}


function generateTips( $categoryID )
{
    global $connection;

    $query = " SELECT tips FROM flywithus.tipstbl ";
    $query .= " WHERE categoryID = ?;";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "i", $categoryID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_bind_result( $stmt, $tipsText );
    $result = mysqli_stmt_fetch( $stmt );

    mysqli_stmt_close( $stmt );

    if ( !$result ) {
        $tipsText = "empty";
    }

    echo '<div class="well well-sm">
          <h3 class="bold">Smart Tip #'.$categoryID.'</h3>

          <p>
          ';
    if ( $tipsText == "" or $tipsText == NULL ) {
        echo 'No tips given for this category.
              </div>
             ';
    } else {
        echo $tipsText
             .'
              </p>

              </div>
              ';
    }
}



function welcomeUser( )
{
    $name = "User";
    // if ( isset( $_SESSION[ 'name' ] ) ) {
    //     $name = $_SESSION[ 'name' ];
    // } else {
    //     errorMessage( "Please log in." );
    // }
    echo '<p>Welcome, ' . $name . '!</p>
          ';
}

function getUsername() {
    $name = "User";
    // if (isset($_SESSION['name'])) {
    //     $name = $_SESSION['name'];
    // } else {
        //errorMessage("hey Please log in.");
    // }
    return $name;
}

function generateJavascript( $categoryInitials, $questionCount, $checkBoxMarkedIndex, $dropDownListMarkedIndex )
{
    //put after the body instead of header
    echo '<script language="javascript">';
    for ( $index = 1; $index < $questionCount; $index++ ) {
        if ( !( in_array( $index, $checkBoxMarkedIndex ) || in_array( $index, $dropDownListMarkedIndex ) ) ) {
            echo 'var check' . $categoryInitials . '0' . $index . ' = 0;';
        }
    }

    for ( $index = 1; $index < $questionCount; $index++ ) {
        if ( !( in_array( $index, $checkBoxMarkedIndex ) || in_array( $index, $dropDownListMarkedIndex ) ) ) {
            echo 'function checked' . $categoryInitials . '0' . $index . '() { "use strict"; check' . $categoryInitials . '0' . $index . ' = 10; }';
        }
    }

    echo 'function checkForm() {';
    for ( $index = 1; $index < $questionCount; $index++ ) {

        if ( !( in_array( $index, $checkBoxMarkedIndex ) || in_array( $index, $dropDownListMarkedIndex ) ) ) {
            if ( !isset( $_SESSION[ $categoryInitials . '0' . $index ] ) ) {
                echo ' if ( check' . $categoryInitials . '0' . $index . ' === 0 ) {
            alert("Please answer Question ' . $index . '!"); return false;
    } ';
            }
        }
    }
    echo 'return true; }';
    echo '</script>';
}

function generatePageTitle( $categoryName = "" )
{
    echo '<script>
            $(document).ready(function() {
    document.title = "flywithus - ' . $categoryName . '";
    });        </script>';
}

function generateQnA( $categoryID = 0, $categoryName = "Travel", $colorScheme = "generic" )
{

    global $connection;

    $query = " SELECT question, questionID, inputType, isDriver FROM flywithus.questiontbl ";
    $query .= " where categoryid = ?;";
    $name = getUsername();
    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "i", $categoryID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_store_result( $stmt );
    mysqli_stmt_bind_result( $stmt, $question, $questionID, $inputType, $isDriver );

    echo '<form action="HowDoYouSurvey.php" id="nextSurveyForm" style="display: inline;" method="POST" >';

    if ( $categoryName === 'Common' ) {
        echo '<h2><strong><span class="name">Hi, ' . $name . '!</span></strong><br>
              <small>Tell us more about yourself.</small></h2>
              ';
    } else {
        echo ( '<h2><strong>' . $categoryName . ' </strong></h2>' );
    }

    $checkBoxMarkedIndex     = array( );
    $dropDownListMarkedIndex = array( );

    $questionIndex = 1;
    while ( $result = mysqli_stmt_fetch( $stmt ) ) {

        if ( $result ) {
            echo '<section class="question">
                 <blockquote>
                 ';

            echoln( '<p class="bold">Q' . $questionIndex . ': ' . $question . '' );
            if ( $inputType == "c" ) {
                echo '<small>Choose as many as you like.</small>';
            }
            if ( $questionID == "4" ) {
                echo' </p>
                      <div class="funkyradio">
                      <div class="funkyradio-primary">
                      <input type="radio" name="radio" id="radioNo">
                      <label for="radioNo">No</label>
                      </div>
                      <div class="funkyradio-primary">
                      <input type="radio" name="radio" id="radioYes" data-toggle="collapse" data-target="#ddl">
                      <label for="radioYes">Yes</label>
                      </div>
                      </div>
                      <div id="ddl" class="collapse">
                      <p> I&#039;d be lying if I said I&#039;m not envious!<br>Where did you go? </p>
                    ';
            }
            echo '
                  <div class="funkyradio">
                  ';
            $categoryInitials = $categoryName;

            getQuestionsAnswer( $questionID, $inputType, $questionIndex, $categoryInitials );

            if ( $inputType == "c" ) {
                $checkBoxMarkedIndex[ ] = $questionIndex;
            }
            if ( $inputType == "d") {
                $dropDownListMarkedIndex[ ] = $questionIndex;
            }
        } else {
            die( "Database query failed" );
            break;
        }

        $questionIndex++;
    }


    mysqli_stmt_free_result( $stmt );
    mysqli_stmt_close( $stmt );

    generateJavascript( $categoryInitials, $questionIndex, $checkBoxMarkedIndex, $dropDownListMarkedIndex );


    generatePageTitle( $categoryName );

}

function getQuestionsAnswer( $questionID, $inputType, $questionIndex, $categoryInitials )
{
    global $connection;
    $query = " SELECT answerID, answer, tripPoints FROM questiontbl, answertbl ";
    $query .= " where (answertbl.questionID = questiontbl.questionID) ";
    $query .= " and questiontbl.questionID = ? ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "i", $questionID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_store_result( $stmt );
    mysqli_stmt_bind_result( $stmt, $answerID, $questionsAnswer, $tripPoints );

    $booleanDDL     = false;
    $qCheckBoxArray = 1;
    $qDDLArray      = 1;
    $colNo          = 0;
    $count = mysqli_stmt_num_rows($stmt);
    while ( $result = mysqli_stmt_fetch( $stmt ) ) {

        if ( $result ) {

            echo '';

            if ( $inputType == null || $inputType == "r" ) {
                echo '
                      <div class="funkyradio-primary">
                      <input id="radio'.$answerID.'" class="choice" name="' .$categoryInitials. '0' .$questionIndex. '" type="radio" value="' . $tripPoints . '"  onclick="checked' . $categoryInitials . '0' . $questionIndex . '()"  ' . checkParameterValue( $categoryInitials . '0' . $questionIndex, $tripPoints ) . '/>
                      <label for="radio' .$answerID. '">' .$questionsAnswer. '</label>
                      </div>
                      ';
            } else if ( $inputType == "c" ) {
                echo '<div class="funkyradio-primary">
                      <input id="checkbox'.$answerID.'" name="cb' .$categoryInitials. '0' .$questionIndex. '[' .$qCheckBoxArray. ']" type="checkbox" value="' . $tripPoints . '" ' . checkParameterValue("cb" . $categoryInitials . '0' . $questionIndex . '[' . $qCheckBoxArray . ']', $tripPoints) . '/>
                      <label for="checkbox' .$answerID. '">' .$questionsAnswer. '</label>
                      </div>
                      ';
                $qCheckBoxArray++;
            } else if ( $inputType == "d" && $questionID !=4) {
                echo ("$questionsAnswer");

                generateDropDownList( $categoryInitials, $questionIndex, $qDDLArray, $answerID );
                $qDDLArray++;
                $booleanDDL = true;
                echo '';
            }
            else if ( $inputType == "d" && $questionID==4) {
                echo '';
                echo ("$questionsAnswer");

                generateTravelDropDownList( $categoryInitials, $questionIndex, $qDDLArray, $answerID );
                $qDDLArray++;
                $booleanDDL = true;
                echo '';
            }
             else {
                echo ( "Please specify an input type." );
            }
            if ( $colNo < ($count-1) ) {
                echo '';
                $colNo++;
            }

            else {
                echo '</div>
                      </blockquote>
                      </section>
                      ';
                $colNo = 0;
            }
        } else {
            die( "Database query failed" );
            break;
        }
    }
    mysqli_stmt_free_result( $stmt );
    mysqli_stmt_close( $stmt );
}

function generateSurveyForm()
{
    $name = getUsername();
    global $connection;
    $query = "select question, questionID, inputType from questions";

    $result = mysqli_query( $connection, $query );

    echo '<form action="FeedbackSubmit.php" method="post">';
    echo '<div id="outerQns">';

    $questionIndex = 1;
    while ( $row = mysqli_fetch_array( $result ) ) {
        echo '<section class="question">
              <blockquote>
              <p class="bold">Q' . $questionIndex . '. ' . $row[ 0 ] . '</p>
              <div class="funkyradio">';
        generateQnAForm( $row[ 1 ], $row[ 2 ], $questionIndex );
        $questionIndex++;
    }
    echo '<input type="hidden" value="' . ( $questionIndex - 1 ) . '" name="qnsCount">';
    echo '</div>
          <div class="text-center">
          <button id="submitBtn" class="btn btn-info btn-lg" data-target="#myModal" data-toggle="modal" type="button">Submit</button>
          </div>
          <div class="clearfix"></div>
          <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
          <div class="bold">
          <h2 class="modal-title">Aww yeah! <span class="glyphicon glyphicon-heart"></span></h2>
          </div>
          </div>
          <div class="modal-body">
          <h3>Thanks,<span class="name"> Friend!</span> Your perfect vacation awaits.</h3>
          </div>
          <div class="modal-footer">
          <p class="text-muted">Not satisfied with our suggestion?<a href="mailto:someone@example.com"> <u>Send us an email</u> for a customized one!</a></p>
          <button class="btn btn-primary" type="submit" onclick=window.location="index.php">Okay!</button>
          </div>
          </div>
          </div>
          </div>
          ';
    mysqli_free_result( $result );
    echo '</form>';
}

function generateQnAForm( $questionID, $inputType, $questionIndex )
{

    global $connection;
    $booleanDDL     = false;
    $qCheckBoxArray = 1;
    $qDDLArray      = 1;
    $colNo          = 0;
    $query = "SELECT answer, answerID FROM answers, questions"
           . " WHERE (answers.questionID = questions.questionID)"
           . " AND questions.questionID = ?";

    $stmt = mysqli_prepare( $connection, $query );
    mysqli_stmt_bind_param( $stmt, "i", $questionID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_store_result( $stmt );
    mysqli_stmt_bind_result( $stmt, $answer, $answerID );

    $colNo          = 0;
    $count = mysqli_stmt_num_rows($stmt);
    while ( $result = mysqli_stmt_fetch( $stmt ) ) {
        if ( $result ) {
            echo '';
            if ( $inputType == null || $inputType == "r" ) {
                echo '<div class="funkyradio-primary">
                      <input id="radio' .$answerID. '" class="choice" type="radio" name="Question' . $questionIndex . '" required value="' . $answer . '"/>
                      <label for="radio' .$answerID. '">' .$answer. '</label>
                      </div>
                      ';
            }
            else if ( $inputType == "c" ) {
                echo '<div class="funkyradio-primary">
                      <input id="checkbox'.$answerID.'" name="cb0' .$questionIndex. '[' .$qCheckBoxArray. ']" type="checkbox"/>
                      <label for="checkbox' .$answerID. '">' .$answer. '</label>
                      </div>
                      ';
                $qCheckBoxArray++;
            } else if ( $inputType == "d") {
                echo ("$answer");
                generateDropDownList($questionIndex, $qDDLArray, $answerID );
                $qDDLArray++;
                $booleanDDL = true;
                echo '';
            }
             else {
                echo ( "Please specify an input type." );
            }
            if ( $colNo < ($count-1) ) {
                echo '';
                $colNo++;
            }

            else {
                echo '</div>
                      </blockquote>
                      </section>
                      ';
                $colNo = 0;
            }
        }

        else {
            die( "Database Query Failed" );
            break;
        }
    }
    mysqli_stmt_free_result( $stmt );
    mysqli_stmt_close( $stmt );
}
function generateDropDownList($questionIndex, $qDDLArray, $answerID )
{

    echo ( '<select class="form-control" name="dd0' . $questionIndex . '[' . $qDDLArray . ']">' );
    //    echo ('<option value ="0"> None </option>');
    getDDLChoices( $answerID, $questionIndex, $qDDLArray );
    echo ( '</select>' );

}

function generateTravelDropDownList($questionIndex, $qDDLArray, $answerID )
{

    echo ( '<div class="input-group">
            <select class="form-control" name="dd0' . $questionIndex . '[' . $qDDLArray . ']">' );
    //    echo ('<option value ="0"> None </option>');
    getDDLChoices( $answerID,$questionIndex, $qDDLArray );
    echo ( '</select><span class="input-group-addon" id="basic-addon2">times</span></div>' );

}

function getDDLChoices( $answerID,$questionIndex, $qDDLArray ) //todo
{
    global $connection;

    $query = " SELECT dropdownchoice, dropdownchoicevalue FROM flywithus.dropdownchoicetbl ";
    $query .= " WHERE answerID = ? ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "i", $answerID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_store_result( $stmt );
    mysqli_stmt_bind_result( $stmt, $dropDownChoice, $dropDownChoiceValue );

    while ( $result = mysqli_stmt_fetch( $stmt ) ) {
        if ( $result ) {
            echo ( '<option value="' . $dropDownChoiceValue . '"  ' . checkDDLParameterValue( "dd0". $questionIndex . '[' . $qDDLArray . ']', $dropDownChoiceValue ) . '>' . $dropDownChoice . '</option>' );
        } else {
            die( "Database query failed" );
            break;
        }
    }
    mysqli_stmt_free_result( $stmt );
    mysqli_stmt_close( $stmt );
}

function checkParameterValue( $name, $value )
{
    //        var_dump($_POST[$name]);
    //        echo "$name has value of $value";
    if ( isset( $_SESSION[ $name ] ) && $_SESSION[ $name ] == $value ) {
        return 'checked="selected"';
    }
}

function checkDDLParameterValue( $name, $value )
{
    //        var_dump($_SESSION[$name]);
    //        echo "$name has value of $value";
    if ( isset( $_SESSION[ $name ] ) && $_SESSION[ $name ] == $value ) {
        return 'selected="selected"';
    }
}

function generatePrevNextButton( $countIndex, $endIndex )
{

    if ( $countIndex == 0 ) {
        echo '<input type="hidden" name="page" value="' . ( $countIndex + 1 ) . '" />';
        echo '<input name="nextBtn" class="btn btn-primary" id="nextBtn" type="submit" value="Please enable Javascript" style="display: inline;" disabled class="button progBtn" /> ';
        echo '</form>';


        echo '<form action="index.php" id="prevSurveyForm" style="display: inline;" method="POST">';
        echo '<input name="prevBtn" class="btn btn-primary" id="prevBtn" type="submit" value="Please enable Javascript" disabled class="button progBtn2" /> ';
        echo '</form>
              </div>';

    } else if ( $countIndex == $endIndex ) {
        echo '</form>';
        echo '<form action="HowDoYouSurvey.php" id="prevSurveyForm" style="display: inline;" method="POST" >';
        echo '<input name="prevBtn" id="prevBtn" type="submit" value="Please enable Javascript" disabled  class="btn btn-primary progBtn2"/> ';
        echo '<input type="hidden" name="page" value="' . ( $countIndex - 1 ) . '" />';
        echo '</form>';
        echo '<form action="Submit.php" id="submitSurveyForm" style="display: inline;" method="POST" >';
        echo '<input name="submitBtn" id="submitBtn" type="submit" value="Please enable Javascript" disabled class="btn btn-success progBtn"/>';
        echo '</form></div>';
    } else {
        //next
        echo '<input name="nextBtn" id="nextBtn" type="submit" value="Next" disabled class="btn btn-primary progBtn" /> ';
        echo '<input type="hidden" name="page" value="' . ( $countIndex + 1 ) . '" />';
        echo '</form>';
        //prev
        echo '<form action="HowDoYouSurvey.php" id="prevSurveyForm"style="display: inline;"  method="POST" >';
        echo '<input name="prevBtn" id="prevBtn" type="submit" value="Please enable Javascript" disabled style="display: inline;" class="btn btn-primary progBtn2" /> ';
        echo '<input type="hidden" name="page" value="' . ( $countIndex - 1 ) . '" />';
        echo '</form></div>';
    }
}


function generateCommonPrevNextButton( )
{
    echo '<ul class="pager">
  	      <li class="next">
  	      <input type="hidden" name="page" value="' . ( 0 ) . '" />
          <input name="nextBtn" id="nextBtn" class="btn btn-primary progBtn" type="submit" value="Next"/>
  	      </li>
          </ul>
         ';
    echo '</form>
          </div>
          ';
}

function generateCategoryTabs( )
{   $name = getUsername();
    echo '<div id="falseBack">
          <nav class="navbar navbar-inverse">
          <div class="container-fluid">
          <div class="navbar-header">
          <button class="navbar-toggle" data-target="#nav" data-toggle="collapse" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">
          <img src="images/brand.png">
          </a>
          </div>
          <div class="collapse navbar-collapse" id="nav">
          <ul class="nav navbar-nav">
          <li>
          <form id="commonSurveyForm" action="index.php" method="POST">
          <input type="submit" value="Common" class="btn btn-default navbar-btn" style="background: transparent; border: none; color: #FFFFFF; font-weight: bold;" />
          </form>
          </li>
    ';

    $categoryArray = generateAllSurveyCategory();
    for ( $index = 0; $index < ( count( $categoryArray ) ); $index++ ) {
        $categoryName = ( $categoryArray[ $index ]->getCategoryName() );
        $colorScheme  = ( $categoryArray[ $index ]->getColorScheme() );
        if ( $categoryName == "Common" ) {
            continue;
        }
        echo '<li>
              <form class="tabs" id="categorySurveyForm" action="HowDoYouSurvey.php" method="POST">
              <input type="hidden" name="page" value="' . $index . '" />
              <input type="submit" id="' . $categoryName . 'TabButton" value="' . ($categoryName) . '" class="btn btn-default navbar-btn" disabled style="background: transparent ; border: none; color:'.$colorScheme.'; font-weight: bold;"/>
              </form>
              </li>
              ';
    }
    echo '</ul>'.
          '</div>
          </div>
          </nav>
          </div>
          ';
}
function getFormulae( )
{
    global $connection;

    $query = " SELECT * FROM flywithus.formulaetbl; ";

    $stmt = mysqli_prepare( $connection, $query );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_store_result( $stmt );
    mysqli_stmt_bind_result( $stmt, $formulaeID, $formulaeName, $formulae );

    $formulaeArray = array( );

    while ( $result = mysqli_stmt_fetch( $stmt ) ) {
        if ( $result ) {
            $formulaeObject = new FormulaeClass();
            $formulaeObject->setId( $formulaeID );
            $formulaeObject->setFormulaeName( $formulaeName );
            $formulaeObject->setFormulae( $formulae );

            $formulaeArray[ $formulaeObject->getFormulaeName() ] = $formulaeObject;
        } else {
            die( "Database query failed" );
            break;
        }
    }

    mysqli_stmt_free_result( $stmt );
    mysqli_stmt_close( $stmt );

    return $formulaeArray;
}

function getDeptIDFromDeptName( $deptName )
{
    global $connection;

    $query = " SELECT departmentID from departmenttbl ";
    $query .= " where abbr = ? ;";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "s", $deptName );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_bind_result( $stmt, $deptID );
    $result = mysqli_stmt_fetch( $stmt );

    mysqli_stmt_close( $stmt );

    if ( !$result ) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        return $deptID;
    }
}

function getExistingUserID( $spiceID )
{
    //This function checks usertbl to identify the $userID that is tied to a $spiceID
    global $connection;

    $query  = " SELECT usertbl.userID ";
    $query .= " FROM usertbl ";
    $query .= " JOIN resultstbl ON usertbl.userID = resultstbl.userID  ";
    $query .= " WHERE year(submissionTime) = year(CURDATE()) and spiceID = ? ; ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "s", $spiceID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_bind_result( $stmt, $userID );
    $result = mysqli_stmt_fetch( $stmt );

    mysqli_stmt_close( $stmt );

    if ( !$result ) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        return $userID;
    }
}

function insertUserDetails( )
{
    //insert/import the user's details from SPICE database
    //get department ID based on loginspice's deptName
    //insert info into usertbl
    //and return userid.
    //then continue to insert result
    $deptName = $_SESSION[ 'deptName' ];
    $deptID   = getDeptIDFromDeptName( $deptName );

    $spiceID = $_SESSION[ 'spiceID' ];
    $name    = $_SESSION[ 'name' ];

    if ( $_SESSION[ 'driver' ] == 'y' ) {
        $isDriver = 1;
    } else {
        $isDriver = 0;
    }

    $spiceIDFirstLetter = substr( $spiceID, 0, 1 );
    if ( $spiceIDFirstLetter == "p" ) {
        $studentOrStaff = "Student";
    } else {
        $studentOrStaff = "Staff";
    }

    global $connection;

    $query = " INSERT INTO usertbl (spiceID, name, departmentID, isDriver, studentOrStaff)";
    $query .= " VALUES (?,?,?,?,?) ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "sssss", $spiceID, $name, $deptID, $isDriver, $studentOrStaff );

    if ( !mysqli_stmt_execute( $stmt ) ) {
        //            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        if ( $stmt->errno ) {
            $existingUserID       = getExistingUserID( $spiceID );
            $_SESSION[ 'userID' ] = $existingUserID;
            return $existingUserID;
        }
        //todo, redirect to index. or surveyresults.
        //            return null;
    } else {
        $returnedUserID       = mysqli_insert_id( $connection );
        $_SESSION[ 'userID' ] = $returnedUserID;
        return $returnedUserID;
    }

    mysqli_stmt_close( $stmt );
}

function insertResult( ResultClass $result )
{
    $eleV = $result->getEleV();
    $eleC = $result->getEleC();

    $fnLifeC    = $result->getfnLifeC();
    $fnLifeV    = $result->getfnLifeV();
    $tptC       = $result->getTpcC();
    $tptV       = $result->getTptV();
    $traC       = $result->getTraC();
    $traV       = $result->getTraV();
    $totalC     = $result->getTotalC();
    $totalEarth = $result->getTotalEarth();

    $userID = insertUserDetails();

    $surveyCompleteDate = date( "Y-m-d H:i:s" );

    global $connection;

    $query = " INSERT INTO resultstbl (eleC, eleV, fnLifeC, fnLifeV, tptC, tptV, traC, traV,totalC, totalEarth, userID, submissionTime) ";
    $query .= " VALUES (?,?,?,?,?,?,?,?,?,?,?, ?) ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "ssssssssssss", $eleC, $eleV, $fnLifeC, $fnLifeV, $tptC, $tptV, $traC, $traV, $totalC, $totalEarth, $userID, $surveyCompleteDate );

    if ( !mysqli_stmt_execute( $stmt ) ) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        if ( $stmt->errno == 1048 ) {
            //errorMessage("You cannot access this page directly.");
        }
    } else {
        echo "Success!";
    }

    mysqli_stmt_close( $stmt );
}

function getResult( )
{

    global $connection;

    // if ( isset( $_SESSION[ 'userID' ] ) ) {
    //     $userID = $_SESSION[ 'userID' ];
    // } else {
    //     errorMessage( "Please log in or complete the survey." );
    // }
    $spiceID = 'p1432208';

    $query = " SELECT resultstbl.eleC, resultstbl.eleV, resultstbl.fnLifeC, resultstbl.fnLifeV, resultstbl.tptC,
    resultstbl.tptV, resultstbl.traC, resultstbl.traV, resultstbl.totalC, resultstbl.totalEarth
    FROM resultstbl ";
    $query .=" JOIN usertbl ON usertbl.userID = resultstbl.userID" ;
    $query .=" WHERE year(submissionTime) = YEAR(CURDATE()) AND resultstbl.userID = ? ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "s", $userID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_bind_result( $stmt, $eleC, $eleV, $fnLifeC, $fnLifeV, $tptC, $tptV, $traC, $traV, $TLC, $TLE );
    $result = mysqli_stmt_fetch( $stmt );

    mysqli_stmt_close( $stmt );

    if ( !$result ) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        $result = new ResultClass();
        $result->setEleC( $eleC );
        $result->setEleV( $eleV );
        $result->setfnLifeC( $fnLifeC );
        $result->setfnLifeV( $fnLifeV );
        $result->setTpcC( $tptC );
        $result->setTptV( $tptV );
        $result->setTraC( $traC );
        $result->setTraV( $traV );
        $result->setTotalC( $TLC );
        $result->setTotalEarth( $TLE );
        return $result;
    }
}

function calculateTonnes (){
    $result = getResult();
    $totalC = $result->getTotalC();
    $bigMacs = number_format($totalC/0.000215, 1, '.',',');
    $polarBears = number_format($totalC/0.41, 1, '.', '');
    echo '
          <h3 class="align">' .$bigMacs. ' Big Macs </h3>
          <h3 class="align">' .$polarBears. ' Polar Bears </h3>
          ';
}

function getPreviousResult( )
{

    global $connection;

    // if ( isset( $_SESSION[ 'spiceID' ] ) ) {
    //     $spiceID = $_SESSION[ 'spiceID' ];
    // } else {
    //     errorMessage( "Please log in or complete the survey." );
    // }
    $spiceID = 'p1432208';

    $query  = " SELECT resultstbl.totalC ";
    $query .= " FROM resultstbl ";
    $query .= " JOIN usertbl ON usertbl.userID = resultstbl.userID ";
    $query .= " WHERE year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year)) AND spiceID = ? ";

    $stmt = mysqli_prepare( $connection, $query );

    mysqli_stmt_bind_param( $stmt, "s", $spiceID );
    mysqli_stmt_execute( $stmt );

    mysqli_stmt_bind_result( $stmt, $TLC2015 );
    $result2015 = mysqli_stmt_fetch( $stmt );

    mysqli_stmt_close( $stmt );

    if ( !$result2015 ) {
        $result2015 = new PreviousResultClass();
        $result2015->setTotalC2015( $TLC2015 );
        return $result2015;

    } else {
        $result2015 = new PreviousResultClass();
        $result2015->setTotalC2015( $TLC2015 );
        return $result2015;
    }
}
