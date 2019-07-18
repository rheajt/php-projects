

$(document).ready(function() {

    var split_arr = sent_array[0].split(" ");

    for (i = 0; i < split_arr.length; i++) {
        var $wordbox = '<div class="wordbox">' + split_arr[i] + '</div>';
        $($wordbox).appendTo('form');
    }

    $('.wordbox').draggable();


});
