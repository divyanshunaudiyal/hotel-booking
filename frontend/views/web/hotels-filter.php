<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<div class="container mt-5">
    <div class="card" style="border: none;">
        <img src="<?= STATIC_URL ?>images/akrisansearch.png"  width="100%" />
        <div class="searchbox">
            <form class="searchform" action="" method="post">
                <input type="search" placeholder="Enter a Destination or Property" class="form-control" />
                <br>
                <br>
                <input type="submit" name="submit" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>

<style>
    .searchbox{
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 20px 5px;
        margin: -100px auto 0px auto;
        width: 90%;
        min-height: 300px;
        background: #f8f7f9;
        border-radius: 10px;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>