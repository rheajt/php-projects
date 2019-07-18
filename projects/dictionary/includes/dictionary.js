var main = function() {
    $('form').submit(function() {
        if($('#words').val().length > 0) {
            var wordList = $('#words').val().replace(/\s/g, '').split(',');

            var returnValue = getResults(wordList);

            console.log(returnValue);

            $('.results-box').slideUp('slow', function() {
                $(this).empty().append(returnValue).slideDown('slow');
            });
        } else {
            $('.results-box').slideUp('slow', function() {
                $(this).empty();
            });
        }
        
        return false;
    });
};

var getResults = function(words) {
    var options = new Object();
    var results;

    options.dataType = 'text';
    options.url = 'word_finder.php';

    options.success = function(e) {
        if(e === 'true') {
            results = "this was true";
        } else {
            results = "did not work";
        }
    };
    
    $.ajax(options);

    return results;
};

$(document).ready(main);