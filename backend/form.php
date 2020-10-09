<form method="POST" action= "contactsd.php">
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">
            <h6>
                Summarize your response to <span id="receiver2"></span> in few words
            </h6>
        </label>
        <input name="email" id="exampleEmail" placeholder="(optional)" type="email" class="form-control">
    </div>            
    <div class="position-relative form-group">
        <label for="exampleText" class="">
            <h6>
                Your response in full details
            </h6>
        </label>
        <textarea name="text" id="exampleText" class="form-control"></textarea>
    </div>
    <button type="Submit" name="submit" value="sub" class="mt-1 btn btn-primary btn-block fr-view">
        Send Response
    </button>
</form>