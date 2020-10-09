<!-- The book whose comments is being displayed -->
<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper row text-white">
                <div class="col-md-6 widget-content-left">
                    <div class="widget-heading"><h5 class="font-weight-bold">BULLETIN</h5></div>
                </div>
                <div class="col-md-6">
                    <button class="ml-2 mr-5 pull-right btn-transition btn btn-sm btn-outline-success" onclick="saveNew()">
                        Add new book
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>

<div class="ml-5">
    <nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="article.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                <span aria-hidden="true">&laquo; </span>
            </a>
        </li>
        <?php 
            $i = $pages > 5 ? $pages - 4 : 1;
            for($i; $i<= $pages; $i++)
            {
            ?>
            <li><a href="article.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
            <?php 
            }
            ?>
        <li>
            <a href="article.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
            class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        </ul>
    </nav>
</div>

<!-- each comments -->
<?php foreach($bulletin as $bulletin) :  ?>
    <div class="row" id="<?= $bulletin['articles_id']; ?>">
        <div class="col-xs-12 mb-4 col-md-8">
            <div class="main-card shadow card">
                <div class="card-body">
                    <h5><span class="card-title"><?= $bulletin['article_title']; ?> </span></h5> 
                    <p>
                        <span><?= $bulletin['article_author']; ?> &nbsp;</span> 
                        <span id="date_posted"> <?= $bulletin['date_added']; ?> &nbsp;</span>
                    </p>
                    <p><?= $bulletin['article_details']; ?>
                    </p>
                    <span>
                        <button id="<?= $bulletin['articles_id']; ?>" name="<?= $bulletin['article_title']; ?>" value="<?= $bulletin['article_author']; ?>" onclick='edit(this.name, this.value, "<?= $bulletin["article_details"]; ?>", this.id)' class="mb-2 mr-5 btn-transition btn btn-outline-info">
                            edit
                        </button>
                        <button id="<?= $bulletin['articles_id']; ?>" onclick="deleteArticle(this.id)" class="mb-2 mr-5 btn-transition btn btn-outline-danger">
                            Delete
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4"></div>
</div>
<?php endforeach; ?>
<!-- each comments -->


<div class="modal fade bd-example-modal-lg mt-5" id="postArticleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-danger">
                Post Article
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="articleTitle" class="">
                                    Title
                                </label>
                                <input name="title" id="articleTitle" placeholder="Title of Article" 
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="articleAuthor" class="">
                                    Author
                                </label><input name="author" id="articleAuthor" 
                                    placeholder="Article is by..." type="text" class="form-control">
                            </div>
                        </div>
                    </div>           
                    <div class="position-relative form-group">
                        <label for="articleDetails" class="">
                            <h6>
                                Article
                            </h6>
                        </label>
                        <textarea name="details" id="articleDetails" class="form-control"></textarea>
                    </div>
                    <input type="text" name="edit" id="edit" value="" hidden>
                    <button type="submit" name="postArticleNow" value="" id="postArticleNow" class="mt-1 btn btn-primary btn-block postArticle">Post Article</button>
                </form>
            </div>
        </div>
    </div>
</div>
