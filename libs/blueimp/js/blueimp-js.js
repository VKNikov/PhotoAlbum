/*
 * Bootstrap Image Gallery JS Demo 3.0.1
 * https://github.com/blueimp/Bootstrap-Image-Gallery
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint unparam: true */
/*global blueimp, $ */

$(function () {
    'use strict';
    $("a").on('click', function(event) {
        //event.preventDefault();
        var id = this.id;
        window.location.href = "/photoalbum/pictures/id/" + id;
    });

    $('#borderless-checkbox').on('change', function () {
        var borderless = $(this).is(':checked');
        $('#blueimp-gallery').data('useBootstrapModal', !borderless);
        $('#blueimp-gallery').toggleClass('blueimp-gallery-controls', borderless);
    });

    $('#fullscreen-checkbox').on('change', function () {
        $('#blueimp-gallery').data('fullScreen', $(this).is(':checked'));
    });

    $('#image-gallery-button').on('click', function (event) {
        event.preventDefault();
        blueimp.Gallery($('#links a'), $('#blueimp-gallery').data());
    });

    $(function () {
        $("#postComment").click(function () {
            $(".error").hide();
            var hasError = false;
            var comment = $("#comment").val();
            if (comment == '') {
                $("#comment").after('<span class="error">You cannot post an empty comment!</span>');
                hasError = true;
            if (hasError == true) {
                return false;
            }
            }
        });
    });

    //$("a").on('click', function(event) {
    //    var id = event.target.id;
    //    $.ajax({
    //        url: 'photoalbum/pictures/id' + id,
    //        method: 'GET'
    //    }).success((function(data) {
    //        $('#comments').html(data);
    //    }))
    // });


    //document.getElementById('links').onclick = function (event) {
    //    event = event || window.event;
    //    var target = event.target || event.srcElement,
    //        link = target.src ? target.parentNode : target,
    //        options = {index: link, event: event},
    //        links = this.getElementsByTagName('a');
    //    blueimp.Gallery(links, options);
    //};
});
