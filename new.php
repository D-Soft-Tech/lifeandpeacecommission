<!-- Modal to add Admin user -->
<div class="modal fade" id="loginModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="usernameLogin">
                            <i class="fa fa-user"></i> Username:
                        </label>
                        <input type="text" class="form-control" id="usernameLogin" name="usernameLogin" placeholder="Username" aria-describedby="inputGroupPrepend" required>            
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="passwordLogin">
                            <i class="fa fa-lock"></i> Password:
                        </label>
                        <input type="password" class="form-control" name="passwordLogin" id="passwordLogin" placeholder="Password" required>        
                    </div>
                </div>
                <button type="submit" name="submit" value="submitLogin" class="form-control btn btn-primary btn-block my-3" data-dismissal="modal" type="submit">Login</button>        
            </form>
        </div>
    </div>
</div>