<?php require_once "template/header.php" ; ?>
    <title>My Contact</title>  
<?php require_once "template/side_header.php" ; ?>

<div class="container-fluid min-vh-100">
    
    <?php include "form.php" ; ?>
    
    
    <div class="row py-2 justify-content-center">
        <div class="col-12">

            <div class="card min-vh-100">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4>My Contacts List :</h4>

                        <a href="#" id="show-form" class="btn btn-secondary">Add New Contact</a>
                    </div>

                    <hr class="my-4">
                

                    <table class="table table-hover table-bordered text-center"> 
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(showData() as $s){ ?>
                                <tr>
                                    <td><?php echo $s['id'] ; ?></td>
                                    <td class="text-center">
                                        <img src="<?php echo $s['photo'] ; ?>" class="t-img" alt="">
                                    </td>
                                    <td><?php echo $s['name'] ; ?></td>
                                    <td><?php echo textFilter($s['phone']) ; ?></td>
                                    <td><?php echo $s['email'] ; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $s['id'] ; ?>" id="update" class="btn btn-sm btn-warning">Update</a>
                                        <a href="delete.php?id=<?php echo $s['id'] ; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are U Sure to Delete 😐 ? ')">Delete</a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>       
        
    </div>



</div>

<?php clearError() ; ?>
<?php require_once "template/footer.php" ; ?>

<script>
     $(".table").DataTable({
        "order": [[ 0, "desc" ]] ,
        "lengthMenu": [[6,10, 25, 50, -1], [6,10, 25, 50, "All"]]
    } ) ;


    $("#show-form").click(function(){

        $("#form").removeClass("d-none") ;

    });

    


    

</script>