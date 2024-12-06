<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commenter un Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .post {
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .comment-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .comment-form button {
            padding: 10px 20px;
            border: none;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }
        .comments {
            list-style: none;
            padding: 0;
        }
        .comments li {
            margin-bottom: 10px;
            padding: 10px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .comments li .comment-author {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Commentaire</h2>
    <div class="comment-form">
        <textarea id="comment" placeholder="Écrire un commentaire..."></textarea>
        <button onclick="addComment()">Ajouter le commentaire</button>
    </div>
    <ul class="comments" id="commentsList">
        <!-- Les commentaires seront ajoutés ici -->
    </ul>
</div>

<script>
    function addComment() {
        var commentText = document.getElementById('comment').value;
        if (commentText.trim() === '') {
            alert('Le commentaire ne peut pas être vide.');
            return;
        }

        var commentsList = document.getElementById('commentsList');
        var newComment = document.createElement('li');

        var commentAuthor = document.createElement('div');
        commentAuthor.classList.add('comment-author');
        commentAuthor.textContent = 'Djen'; // Vous pouvez changer ceci pour récupérer le nom de l'utilisateur
        newComment.appendChild(commentAuthor);

        var commentContent = document.createElement('div');
        commentContent.classList.add('comment-content');
        commentContent.textContent = commentText;
        newComment.appendChild(commentContent);

        commentsList.appendChild(newComment);
        document.getElementById('comment').value = '';
    }
</script>

</body>
</html>