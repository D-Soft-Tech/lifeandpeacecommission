<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card mb-2 widget-content bg-premium-dark">
            <div class="row widget-content-wrapper text-white">
                <div class="col-6 widget-content-left shadow">
                    <div class="widget-heading"><h5 class="font-weight-bold">Books</h5></div>
                </div>
                <div class="col-6">
                    <button class="ml-2 mr-5 btn-transition btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#addBook">
                        Add new Book
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>

<div class="ml-5 row">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="books.php?pages=<?= $Previous; ?>&page=<?= $page; ?>" 
                    class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Previous">
                    <span aria-hidden="true">&laquo; </span>
                </a>
            </li>
            <?php 
                $i = $pages > 5 ? $pages - 4 : 1;
                for($i; $i<= $pages; $i++)
                {
                ?>
                <li><a href="books.php?page=<?= $i; ?>&pages=<?= $pages; ?>" class="btn btn-transition btn btn-sm btn-outline-primary"><?= $i; ?></a></li>
                <?php 
                }
                ?>
            <li>
                <a href="books.php?pages=<?= $Next; ?>&page=<?= $page; ?>"
                class="btn btn-transition btn btn-sm btn-outline-primary" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


<!-- each comments -->
<div class="row mt-1 mb-3">
    <?php foreach($books as $books) :  ?>
        <div class="col-6 col-md-2 mt-1 mb-3" id="<?= $books['book_id']; ?>">
            <div class="row">
                <div class="col-xs-12 mx-auto px-2" style="height: 200px; width: 100%;">
                    <div class="" id="book-top">
                        <img class="img-resoponsive" src="../images/books/<?= $books['book_title']; ?>.<?= $books['ext']; ?>" alt="<?= $books['book_title']; ?>" style="height: 200px; width: 100%;" />
                        <div class="overlay">
                            <button id="<?= $books['book_id']; ?>" name="<?= $books['book_title']; ?>" value="<?= $books['ext']; ?>.<?= $books['ext2']; ?>" class="btn btn-dark m-1 removeBook" title="Delete"><i id="<?= $books['book_id']; ?>" class="fa fa-lg fa-trash removeBook"></i></button>
                            <button id="<?= $books['book_id']; ?>" name="<?= $books['book_title']; ?>" value="<?= $books['price']; ?>" class="btn btn-dark m-1 editPrice" title="Edit Price"><i class="fa fa-lg fa-edit editPrice"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 card-footer py-1 mx-2" style="width: 100%;">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-info"><?= $books['book_title']; ?></h6>
                        </div>
                        <div class="col-md-12">
                            <h6 class="">Sold: <span class="text-success">120</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade bd-example-modal-lg mt-2" id="newPrice" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="false">
    <div class="modal-dialog modal-lg mt-5 mb-5">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                Set new price for this book: <span id="bookName" class="font-weight-bold text-success"></span>
            </h5>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h6 class="card-title">Old Price: <span id="oldPrice"></span></h6>
                        <label for="newPrice">New Price</label>
                        <input type="number" name="newPriceSet" class="form-control" id="newPriceSet" required>
                    </div>
                </div>
                <button type="submit" id="" class="btn btn-primary btm-sm btn-block saveNewPrice">Save</button>
            </form>
        </div>
    </div>
</div>