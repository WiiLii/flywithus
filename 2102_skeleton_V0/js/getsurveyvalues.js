$(document).ready(function()
{

    $('.choice').on('change', function() {
    var nextQuestion = $(this).closest('.question').next();
        if (nextQuestion.length !== 0) {
            $('html, body').animate({
                scrollTop: nextQuestion.offset().top - 100
            }, 1000);
        }
    });
    markCategoryDone();
    $("#contentBox").hide().fadeIn("slow");
    $("#nextBtn").attr("value", "Next");
    $("#prevBtn").attr("value", "Previous");
    $("#submitBtn").attr("value", "Submit");
    $("#nextBtn, #prevBtn, #submitBtn").attr("disabled", false);
    $("#nextBtn, #prevBtn").click(function(event)
    {
        event.preventDefault();
        var jsonString = JSON.stringify(getAllSelectedValues());
        console.log(getAllSelectedValues());
        var nextSurveyForm = $("#nextSurveyForm");
        var prevSurveyForm = $("#prevSurveyForm");
        var bypassCheck = false;
        if ($(this).is($("#prevBtn")))
        {
            bypassCheck = true;
        }
        if (bypassCheck || checkForm() === true)
        {
            $.ajax(
                {
                    type: "POST",
                    //                         url: "ajax/ajaxCall.php",
                    url: "ajax/ajaxPassVariables.php",
                    cache: false,
                    async: false,
                    data:
                    {
                        myArrayData: jsonString
                    },
                    //                             success: function(data){
                    //                             alert(data);
                    success: function()
                    {
                        if ($(window).scrollTop() >= 0)
                        {
                            $("html, body").animate(
                                {
                                    scrollTop: 0
                                }, "slow", function()
                                {
                                    $("#contentBox").fadeOut("slow", function()
                                    {
                                        submitPage(bypassCheck, nextSurveyForm, prevSurveyForm);
                                    });
                                });
                        }
                    }
                });
        }
    });
    $(".tabs").click(function()
    {
        var jsonString = JSON.stringify(getAllSelectedValues());
        $.ajax(
            {
                type: "POST",
                //                         url: "ajax/ajaxCall.php",
                url: "ajax/ajaxPassVariables.php",
                cache: false,
                async: false,
                data:
                {
                    myArrayData: jsonString
                },
                success: function() {}
            });
    });
    $("#submitBtn").click(function(event)
    {
        event.preventDefault();
        var jsonString = JSON.stringify(getAllSelectedValues());
        var submitSurveyForm = $("#submitSurveyForm");
        if (checkForm() === true)
        {
            $.ajax(
                {
                    type: "POST",
                    //                         url: "ajax/ajaxCall.php",
                    url: "ajax/ajaxPassVariables.php",
                    cache: false,
                    async: false,
                    data:
                    {
                        myArrayData: jsonString
                    },
                    success: function()
                    {
                        if ($(window).scrollTop() >= 0)
                        {
                            $("html, body").animate(
                                {
                                    scrollTop: 0
                                }, "slow", function()
                                {
                                    $("#contentBox").fadeOut("slow", function()
                                    {
                                        submitPageFinal(submitSurveyForm);
                                    });
                                });
                        }
                    }
                });
        }
    });
}); //end of ready
var submitPage = function(bypassCheck, nextSurveyForm, prevSurveyForm)
{
    if (!bypassCheck)
    {
        nextSurveyForm.submit();
    }
    else
    {
        prevSurveyForm.submit();
    }
};
var submitPageFinal = function(submitSurveyForm)
{
    submitSurveyForm.submit();
};
var markCategoryDone = function()
{
    $.ajax(
        {
            type: "POST",
            //                         url: "ajax/ajaxCallCategoryMarker.php",
            url: "ajax/ajaxMarkCategory.php",
            cache: false,
            async: true,
            success: function(tabData)
            {
                //                                 alert(tabData);
                var array = eval(tabData);
                for (var index in array)
                {
                    $("#" + array[index] + "TabButton").attr("disabled", false);
                }
            }
        });
};

var getAllSelectedValues = function()
{
    var selectedValues = {}; //declare associate array
    $('input:radio').each(function()
    {
        if ($(this).prop('checked'))
        {
            var $this = $(this),
                name = $this.attr('name'),
                value = $this.attr('value');
            selectedValues[name] = value;

        }
    });
    $('input:checkbox').each(function()
    {
        if ($(this).prop('checked'))
        {
            var $this = $(this),
                name = $this.attr('name'),
                value = $this.attr('value');
            selectedValues[name] = value;
        }
        if (!$(this).prop('checked'))
        {
            var $this = $(this),
                name = $this.attr('name'),
                value = 0;
            selectedValues[name] = value;
        }
    });
    $("select").each(function()
    {
        var $this = $(this),
            name = $this.attr('name'),
            value = $(this).val();
        selectedValues[name] = value;
    });
    return selectedValues;
};
