<?
Created in Sublime Text 3
#22 June 2016
I have to create a function() that allows 2015 users to be able to view their results back in 2015.

Is there an issue?

A few.

Currently the application functions like that:
When you log in, the application will check with the database to see if you have attempted it.
It determines this by checking if your USER ID is in the database.
So this means that you are not able to participate in 2016 if you have done so in 2015, because
in 2015 your USER ID is in the database.

Okay, so to solve this issue we can use the date and time of their submissions, right?
Yes.
For now, this statement checks if you have attempted the challenge in 2016:

  SELECT resultstbl.userID, usertbl.userID
  FROM resultstbl
  JOIN usertbl ON usertbl.userID = resultstbl.userID
  WHERE year (submissionTime) = 2016

This will return the USER ID of people who has attempted the challenge in 2016.
To make it future-proof, the WHERE clause can be changed to:
WHERE year(submissionTime) = year(CURDATE()).

Currently, the application executes this statement:
  $query  ="SELECT resultstbl.userID, usertbl.userID";
  $query .="FROM resultstbl";
  $query .="JOIN usertbl ON usertbl.userID = resultstbl.userID";
  $query .="WHERE year(submissionTime) = year(CURDATE())";

Therefore, function checkSurveyDone() can be updated to check for the year of submission rather than
checking if the USER ID exists in the database.

Okay, the next one is why the hell can I only insert (haha) my data only once (hahaha) into usertbl?
I do realize that it will definitely be linked to resultstbl in some way, but now I actually want to have
more than one of me in the database.

I have to consider some things, the USER ID, SPICE ID, and SUBMISSION TIME will be the unique identifiers now.
I would think that USER ID takes the cake for the most unique identifier, followed by SPICE ID and SUBMISSION TIME.

Under phpMyAdmin I can see that the usertbl was created to have the SPICE ID to be unique. Okay, so this means that
in 2015 all of the participants has their SPICE ID set to unique too, data migration incoming.

Anyway, I will now try to reconstruct usertbl to have nothing unique.

#23 June 2016

It looks like I can insert more (hahahahaha) than one of my own data into the database.
Willie Chua has appeared twice on usertbl and resultstbl. Sweet.
Okay, now when I sign in again, we can see that it only shows the 2015 result.

I will now look into SurveyResults.php.
OKAY YOU KNOW WHAT?! NOT YET. Admin will see double the amount of students. //TODO Look into how the Admin sees this data

Anyway, it seems that the authentication functions as intended, but the lucky draw button has to be removed for the second time they sign in.

Gas Bill Question:
Add the N/A Option

USE POLAR BEARS! (And big macs :D)

#24 June 2016

Today I discovered that there is an issue regarding the submisson of more than one row of data in the same year.
What is happening is that you can submit, go back to the form, and submit again. This creates more than one row
of the same user data.

The only way I can think of, is to have a function() that asks the database if this user has already submitted this year,
if true, do not insert a new row. If false, insert a new row.

I am going to go check on the php class() that handles this
The php class() in question is Submit.php. I have included the function checkSurveyDone() to check
for the USER ID and the current year.

Works! The user can only submit once per year. Issue to work out is that after they submit, at first they will see their
2016 result, press back, and submit again, they will see their 2015 result.

Next up, another bug has been found. Reflection.php only updates the first instance of the user row.
Meaning, in 2015 WILLIE CHUA has submitted his answers, Option A and 12.8 grams in 2015.
Now in 2016, the questions have changed and there is already a new 2016 row for WILLIE CHUA is created, but
his 2016 feedback only updates his 2015 row.

I am looking into class() FeedbackSubmit.php, it contains the SQL statements to update the
columns in resultstbl.
I am growing more suspicious of the function getExistingUserID(). It seems to be the one that
points to the correct row of the database. Therefore, this should be where I edit the SELECT
statement to also include the year criteria.

#25 June 2016

Tried to modify function getExistingUserID() by adding this:
    $query  = " SELECT resultstbl.userID, usertbl.userID ";
    $query .= " FROM resultstbl ";
    $query .= " JOIN usertbl ON usertbl.userID = resultstbl.userID ";
    $query .= " WHERE year(submissionTime) = year(CURDATE()) and spiceID = ? ";
    $query .= " limit 1; ";

And it does not work. No surpirse there. Let us see what the initial mysql_query() returns.
    $query = " SELECT userID FROM carbonfpdb.usertbl ";
    $query .= " where spiceID = ?;";

It returns two userIDs. As we can see from the statement, it is independent of resultstbl. This
means that we currently cannot check which userID belongs to which year. Commence joining
of tables!

Here is what I have to include: 
1) spiceID from usertbl
2) submissionTime from resultstbl
And the mysql_query() has to return only one userID.

	$query  = " SELECT usertbl.userID ";
	$query .= " FROM usertbl ";
	$query .= " JOIN resultstbl ON usertbl.userID = resultstbl.userID  ";
	$query .= " WHERE year(submissionTime) = year(CURDATE()) and spiceID = ? ; ";

This mysql_query() returns only one USER ID.
Tested by deleting 2016 data, runs as intended. Only issue is that Reflection.php only updates the first instance
of the user.

Going back to class() FeedbackSubmit.php, we can see that this is the select statement for usertbl:
	
	$selQuery = "SELECT userID, spiceID FROM usertbl WHERE spiceID = '$spiceID'";

This returns two columns, USER ID and SPICE ID. I will have to modify the statement to point to a 
single row since I want to select a single row based on the current year.

	$selQuery = " SELECT usertbl.userID, usertbl.spiceID ";
    $selQuery.= " FROM usertbl ";
    $selQuery.= " JOIN resultstbl ON usertbl.userID = resultstbl.userID  ";
    $selQuery.= " WHERE year(submissionTime) = year(CURDATE()) and spiceID = '$spiceID'";

This also returns two columns, USER ID and SPICE ID from usertbl. Reflection.php and 
FeedbackSubmit.php now works as intended.

Siiick. Now I will start to edit SurveyResults.php to make it show 2015 and 2016 results.

SurveyResults.php uses the function getResults() to get the result that the USER ID has this year.
Therefore, if I would like to show the user their 2015 result, there will have to be a function
that retrieves their 2015 result, probably based on their SPICE ID.

I am looking into creating similar function getPreviousResults();
This function() has to be similar to function getResults(), only that it selects the 2015 result.

This is the mysql_query() that is used to find 2015 results:
	Select resultstbl.totalC
	from resultstbl
	JOIN usertbl ON usertbl.userID = resultstbl.userID
	where year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year)) and spiceID = ?;

Within ResultClass.php I have also added a class() called PreviousResultClass.
This allows the building of a new array of only one result.

Anyway, it seems that the previous result can be shown, so this is the end of the previous result saga.

#27 June 2016
Now that the previous result can be shown, it is time to make it look good.
Well I spent the day being sick and all.

#28 June 2016
Today I will try to make the survey form seem shorter than it is by implementing a Javascript which
makes scrolling automatic after a question is answered.

This is the JSFiddle I am following:

HTML()
<section class='question'>
    <h2>Title of the question</h2>
    <ul>
        <li><input type="radio" name="a" class='choice'>Answer 1</li>
        <li><input type="radio" name="a" class='choice'>Answer 2</li>
        <li><input type="radio" name="a" class='choice'>Answer 3</li>
    </ul>
</section>
<section class='question'>
    <h2>Title of the question</h2>
    <ul>
        <li><input type="radio" name="b" class='choice'>Answer 1</li>
        <li><input type="radio" name="b" class='choice'>Answer 2</li>
        <li><input type="radio" name="b" class='choice'>Answer 3</li>
    </ul>
</section>
<section class='question'>
    <h2>Title of the question</h2>
    <ul>
        <li><input type="radio" name="c" class='choice'>Answer 1</li>
        <li><input type="radio" name="c" class='choice'>Answer 2</li>
        <li><input type="radio" name="c" class='choice'>Answer 3</li>
    </ul>
</section>
<section class='question'>
    <h2>Title of the question</h2>
    <ul>
        <li><input type="radio" name="d" class='choice'>Answer 1</li>
        <li><input type="radio" name="d" class='choice'>Answer 2</li>
        <li><input type="radio" name="d" class='choice'>Answer 3</li>
    </ul>
</section>
<section class='question'>
    <h2>Title of the question</h2>
    <ul>
        <li><input type="radio" name="e" class='choice'>Answer 1</li>
        <li><input type="radio" name="e" class='choice'>Answer 2</li>
        <li><input type="radio" name="e" class='choice'>Answer 3</li>
    </ul>
</section>

Javascript()
$('.choice').on('change', function() {
    var nextQuestion = $(this).closest('.question').next();
    
    if (nextQuestion.length !== 0) {
        $('html, body').animate({
            scrollTop: nextQuestion.offset().top
        }, 1000);
    }
});

#1 July 2016
Changed some of the code! Swap redirecting for HomePageAuthenticate and Submit.php

#2 July 2016
WADDUP WEEKEND OVERTIME!
Today I have to do three (EDIT: it is now 4, bitch!) things:
1) Add a panel to SurveyResults.php that reflects the change in carbon footprint since 2015.
2) Make sure that Admin only has to deal with 2016 data
3) Look back into the change that I have made to the redirecting, apparently you can attempt it twice. God $$$$$$$ damn it.
4) Almost forgot, look into why question 1 does not save properly, also add in N/A for Gas Bill Question.

Okay, starting with adding the panel!
Looking into SurveyResults.php once again.

Well I must have messed with something during the redirecting. I think I have to get the select statement for
the function getResult() working. This is the current statement being used:
    $query = " Select eleC, eleV, fnLifeC, fnLifeV, tptC, tptV, traC, traV, totalC, totalEarth from resultstbl ";
    $query .= " where userID = ?";
    $query .= " limit 1; ";

This statement returns one row with all the columns that belong to the userID on resultstbl.

The following sql statement is the updated one that I am using:

    $query = " SELECT resultstbl.eleC, resultstbl.eleV, resultstbl.fnLifeC, resultstbl.fnLifeV, resultstbl.tptC,
               resultstbl.tptV, resultstbl.traC, resultstbl.traV, resultstbl.totalC, resultstbl.totalEarth
               FROM resultstbl ";
    $query .=" JOIN usertbl ON usertbl.userID = resultstbl.userID ";
    $query .=" WHERE year(submissionTime) = YEAR(CURDATE()) AND resultstbl.userID = ? ";

This statement returns one row with all the columns that belong to the userID on resultstbl.

I also have swapped the redirecting in HomePageAuthenticate once again.

I want to revisit function checkSurveyDone() once again, I think I should check what the previous statement checked.
This is the statement that was used:

    $query = " SELECT * FROM resultstbl ";
    $query .= " where userid = ? ";
    $query .= " limit 1; ";

This statement returns exactly one row with every column that is tied to the userID. We can also see that
the unique identifier is the userID, so the new SQL statement has to also include the userID.

I am now using this SQL statement:

    $query  = " SELECT resultstbl.userID ";
    $query .= " FROM resultstbl ";
    $query .= " JOIN usertbl ON usertbl.userID = resultstbl.userID ";
    $query .= " WHERE year(submissionTime) = year(CURDATE()) AND resultstbl.userID = ? ";
    $query .= " limit 1; ";

I have also switched back the redirecting for HomePageAuthenticate and Submit.php.
Testing by having no 2015 data...
Works as intended.
Changing 2016 submissionTime year from 2016 to 2015...
Works as intended.
Deleted 2015 data, keeping only the 2016 one...
Signed in and saw only 2016 data!
I think I got the redirecting and submitting of data down. It is time to update SurveyResults.php
with the panel that shows the change of carbon footprint.

To be able to retrieve 2015 data from the database, I have added a few things,
namely function getPreviousResults() in functions.php and class() PreviousResultClass in PreviousResultClass.php.
They function() pretty much the same, only that they only execute an SQL statement to get $totalC from 2015 and build
a new array out of that.

Here is the SQL statement that runs:
    $query  = " SELECT resultstbl.totalC ";
    $query .= " FROM resultstbl ";
    $query .= " JOIN usertbl ON usertbl.userID = resultstbl.userID ";
    $query .= " WHERE year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year)) AND spiceID = ? ";

and the class():
class PreviousResultClass {

    private $totalC2015;

    public function getTotalC2015() {
        return $this->totalC2015;
    }
    public function setTotalC2015($totalC2015) {
        $this->totalC2015 = $totalC2015;
        return $this;
    }
}

Implemented. SurveyResults.php has been updated.

Moving on to item number 2, which is to make sure that admin only has to deal with 2016 results.
First I should explore the admin folder.

It seems that I have to look into SurveyStats.php the most.
I am adding: 

and year(r.submissionTime) = year(curdate())

to everything I see and I will see what happens, hahaha!

This is the counting SQL being used:

$countQuery = "select count(distinct usertbl.userid)
               from resultstbl
               JOIN usertbl ON usertbl.userID = resultstbl.userID
               JOIN departmenttbl ON usertbl.departmentID = departmenttbl.departmentID
               where usertbl.departmentID = $deptRows[4] and usertbl.studentOrStaff = '$pageType' 
               and year(resultstbl.submissionTime) = year(curdate())";

I have added and year(r.submissionTime) = year(curdate())
so many times that they are all displaying correctly so there it is. Admin will only ahve to deal with 2016 data.

!At this point I have added the video and N/A option to the gas question.

Now, looking into why Question 1 does not save properly. Maybe can be applied to Travelling overseas question too.
Changed the carbonvalue of each of the choices to 1, 2 ,3 , and 4.
Does not affect total earth.

Well there we go, the end of this saga.

#5 July 2016
Change the CSS for 11 July to 15 July (Bold and make it bigger)

Target = "_blank" for the links. New tabs!
Change the hyperlink for Watch.

Add a line that says it is 2016!
Highlight numbers and stuff

Make sure that admin can see the most recent results. Currently admin cannot see their feedback answers.

N/A for the recycling question
since some people do not recycle at all.

It seems that Chrome does not submit the feedback while firefox does. I must look into this.
Fixed. Apparently I nested an <a> within <button>.

#11 July 2016
This entire time I did not really optimize the includes and header tags. Should really look into
this with Google Chrome Performance Audit.

#14 July 2016
I have to create a function() that displays the most improved result.

I think it is okay to just leave it under SurveyStats.php.

I foresee that the class() has to select 2015 totalC and 2016 totalC,
after which it has to deduct 2016 totalC from 2015 totalC,
and finally it has to arrange the results by ascending order.

The SQL statement should contain:
1) Name of the user
2) 

This is the select statement that I am using:

#15 July 2016
I am having so much trouble figuring out the SQL statement to use.
One thing that is bothering me is that I have to match the userIDs by spiceID,
what kind of statement runs through the entire database looking for matching spiceIDs?

Okay, so what happens is that this statement has to look up the name, userID, spiceID,
2015 result, 2016 result.

How do you match the 2015 result to their 2016 result? Their spiceIDs.
What the hell is a group by? 

Anyway, stuff and things and then this:

SELECT 
    b.result - a.result AS improvement
FROM
(
    SELECT userTbl.name, userTbl.userID, r.totalC AS result
    FROM   resultsTbl r
    JOIN userTbl ON userTbl.userID = r.userID 
    WHERE  year(submissionTime) = year (curdate()) and r.spiceID = 'p1432208'
) a
CROSS JOIN
(
    SELECT userTbl.name, userTbl.userID, r.totalC AS result
    FROM   resultsTbl r
    JOIN userTbl ON userTbl.userID = r.userID 
    WHERE year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year)) and usertbl.spiceID = 'p1432208'
) b

Okay, cool. So we can subtract totalC from different years. Only thing is, how do I modify this to run through the
entire database? I am thinking of how to link userID (2015) to userID (2016) by the spiceID.

#18 July 2016
Sooo what happened was that I am allowed to manually select from the database based on this SQL:
    SELECT usertbl.spiceID, usertbl.name, resultstbl.totalC 
    FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID 
    WHERE year(submissionTime) = 2015 and usertbl.studentorstaff = 'Staff' 
    ORDER BY `usertbl`.`spiceID` ASC

This basically runs through the database to find all of the staff who submitted in 2015.

Now for 2016:
    SELECT usertbl.spiceID, usertbl.name, resultstbl.totalC 
    FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID 
    WHERE year(submissionTime) = year(curdate()) and usertbl.studentorstaff = 'Staff' 
    ORDER BY `usertbl`.`spiceID` ASC

Now we get all of the staff members who participated in 2016.

NOW IT GETS SUPER MANUAL.

1) Copy all of the rows and columns, paste it in Excel.
2) Create one book for each of the years (2015 & 2016).
3) Create a new book to add in all of the entries, sorted by ascending spiceID.
4) Search for unique spiceIDs
5) Delete entries with unqiue spiceIDs.
6) After getting an equal number of entries from 2015 and 2016, take their 2015 totalC and subtract it from
   their 2016 totalC.
7) Get result.

Siiick. Now how do I make this into a php function?

What if we did a check if they did the survey this year and last year?
If true, run the improvement query.
If false, do not run the improvement query.

SELECT usertbl.spiceID
FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID 
WHERE year(submissionTime) = 2015 and usertbl.studentorstaff = 'Staff' 
ORDER BY `usertbl`.`spiceID` ASC

SELECT resultstbl.userID, userTbl.name, usertbl.spiceID, resultstbl.totalC
FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID 
WHERE year(submissionTime) = year(curdate()) and usertbl.studentorstaff = 'Staff' and usertbl.spiceID = $spiceID

Okay, I realize that I can NEVER return a string for the spiceID because it will always be an array.
Sooo for each row in that array we check for a matching spiceID?

#20 July 2016
Well the past two days had been a very bad series of failed attempts to drum up an SQL statement.
Here is what I am going to do today:

SQL statement to retrieve the list of spiceIDs of every staff member who participated in 2015.
For each of the spiceID on the list, check for year(submissionTime) = year(CURDATE()).

I am going to just build a new database table.

#21 July 2016
Look into why Student ASC start with 10.0
List of Staff members eligible for Lucky draw
First 200 Staff
First 100 Students
Students have to answer the question correctly to be eligible.
!All fixed and delivered

#22 July 2015
Okay, so admin can see the top 10 most improved staff members in Singapore Polytechnic.
This is done by creating a new table called carbonlogtbl. In this table there are six columns:
logID, spiceID, name, totalC2015, totalC2016, and improvement.

The application has to check if there is an existing spiceID in the database.

if false, add in a new row, and record the current year totalC under totalC2016.

if true, set update totalC2016 as totalC and set update totalC2015 as totalC2016.

Finally, improvement will be totalC2016 minus totalC2015.

I would have to look into Submit.php.

#25 July 2016

Today I am running sooo many SQL statements.

To INSERT new row in carbonlogtbl:
    INSERT INTO `carbonfpdb`.`carbonlogtbl` (`logID`, `spiceID`, `name`, `totalC2015`, `totalC2016`, `improvement`) 
    VALUES (NULL, 's0000', 'Admin', '25.000', '10.000', '15.000');

To update the columns in carbonlogtbl:
​   UPDATE `carbonfp`.`usertbl` SET `departmentID` = '32' WHERE `usertbl`.`userID` = 1488;

To see the first 200 staff members who attempted the challenge:
    SELECT u.name , u.spiceID , d.departmentname , r.submissionTime 
    FROM usertbl u INNER JOIN resultstbl r on u.userid = r.userid 
    INNER JOIN departmenttbl d on d.departmentid = u.departmentid 
    WHERE year(r.submissionTime) = year(curdate()) 
    AND u.studentorstaff = 'Staff' ORDER BY `r`.`submissionTime` ASC 

To see the first 100 students who attempted the challenge:
    SELECT u.name, u.spiceID, d.departmentname, r.submissionTime
    FROM usertbl u
    INNER JOIN resultstbl r
    on u.userid = r.userid
    INNER JOIN departmenttbl d
    on d.departmentid = u.departmentid
    WHERE year(r.submissionTime) = year(curdate())
    AND u.studentorstaff = 'Student'

To calculate the improvement:
    SELECT usertbl.spiceID, b.result - a.result AS improvement
    FROM usertbl
    WHERE usertbl.spiceID in (
    (
        SELECT userTbl.name, userTbl.userID, r.totalC AS result
        FROM   resultsTbl r
        JOIN userTbl ON userTbl.userID = r.userID 
        WHERE  year(submissionTime) = year (curdate()) and usertbl.spiceID = 'p1432208'
    ) a
    CROSS JOIN
    (
        SELECT userTbl.name, userTbl.userID, r.totalC AS result
        FROM   resultsTbl r
        JOIN userTbl ON userTbl.userID = r.userID 
        WHERE year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year)) and usertbl.spiceID = 'p1432208'
    ) b
    )

#28 July 2016
Without creating a new table, I should still be able to find the top 10 most improved staff.
I am creating a new php class: datatables.php and a new page: viewdatatables.php.

This SQL statement will gather the list of spiceIDs from 2015:

$spiceIDQuery = "SELECT usertbl.spiceID
                 FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID
                 WHERE year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year)) 
                 AND usertbl.studentorstaff = 'Staff' ";

Next, for every row of the spiceID array, match it with the 2016 result:

$userQuery = "SELECT userTbl.name, usertbl.spiceID, CAST(totalC AS DECIMAL(9,3)) AS totalC
              FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID
              WHERE year(submissionTime) = year(curdate())
              AND usertbl.studentorstaff = 'Staff'
              AND usertbl.spiceID = '$row[0]' ;"

Finally, this SQL statement to get the 2015 result:

$secondUserQuery = "SELECT CAST(totalC AS DECIMAL(9,3)) AS totalC
                    FROM usertbl JOIN resultstbl ON usertbl.userID = resultstbl.userID
                    WHERE year(submissionTime) = YEAR(DATE_ADD(CURDATE(), INTERVAL -1 year))
                    AND usertbl.studentorstaff = 'Staff'
                    AND usertbl.spiceID = '$row[0]' ;";

?>