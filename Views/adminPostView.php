<?php $title = "Administration des posts" ?>
<?php ob_start(); ?>

<section class="container">
<?php 
    $postManager = new PostManager();
    $req = $postManager->getPosts();
    while ($data = $req->fetch()) 
    {
        ?>
        <article>
            <h2><?= $data['title'];?></h2>
            <p>posté le <?php echo $data['creation_date_fr'];?></p>
            <p><?= substr(nl2br($data['post']),0,400);?></p>   
            <a href="index.php?action=adminPostModify&id=<?= $data['id']; ?>" title="Modifier le post" class="btn btn-primary"><i class="far fa-edit"></i></a>
            <a href="index.php?action=adminPostDelete&id=<?= $data['id']; ?>" title="Supprimer le post" class="btn btn-primary" data-toggle="modal" data-target="#modal"><i class="far fa-trash-alt"></i></a>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment supprimer ce post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">Supprimer </button>
                    </div>
                </div>
            </div>
            </div>
        </article>
        <?php
    }
    $req->closeCursor();
    ?>
</section>

<script src="scripts/tiny.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>