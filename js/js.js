/**
 * Created by Vassil on 9.5.2015 г..
 */

$(function () {
    'use strict';

    $(".anchorButton").on('click', function(event) {
        event.preventDefault();
        var id = this.id;
        window.location.href = "/photoalbum/pictures/id/" + id;
    });

    $("downloadAlbum").on('click', function(event) {
        var id = this.id;

        $.post('/photoalbum/ajax.php', {download: item }, function(data) {
            //location.reload();
            window.location.href = "/photoalbum/index";
        });
    });

    $("#deleteButton").on('click', function(event) {
        var pictureId = $('#deletePicture').val();
        var userId = $('#userId').val();
        var filename = $('#filename').val();
        var item = {'pictureId' : pictureId, 'user_id': userId, 'filename': filename};

        $.post('/photoalbum/ajax.php', {deletePicture: item }, function(data) {
            //location.reload();
            window.location.href = "/photoalbum/index";
        });
    });

    $('#like').click(function() {
        var userId = $('#userId').val();
        var pictureId = $('#pictureId').val();
        var item = {'user_id' : userId, 'picture_id' : pictureId};

        $.post('/photoalbum/ajax.php', {like: item }, function(data) {
            location.reload();
        });
    });

    $('#unlike').click(function() {
        var userId = $('#userId').val();
        var pictureId = $('#pictureId').val();
        var item = {'user_id' : userId, 'picture_id' : pictureId};

        $.post('/photoalbum/ajax.php', {unlike: item }, function(data) {
            location.reload();
        });
    });

    $('#likeAlbum').click(function() {
        var userId = $('#userId').val();
        var albumId = $('#albumId').val();
        var item = {'user_id' : userId, 'album_id' : albumId};

        $.post('/photoalbum/ajax.php', {likeAlbum: item }, function(data) {
            location.reload();
        });
    });

    $('#unlikeAlbum').click(function() {
        var userId = $('#userId').val();
        var albumId = $('#albumId').val();
        var item = {'user_id' : userId, 'album_id' : albumId};

        $.post('/photoalbum/ajax.php', {unlikeAlbum: item }, function(data) {
            location.reload();
        });
    });


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