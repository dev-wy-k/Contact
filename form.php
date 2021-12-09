
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center d-none" id="form">
            <div class="col-12 col-md-6">
                        
                <div class="card">
                    <div class="card-body">

                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php" class="btn btn-secondary">Back</a>
                            <h4 class="">Add To Contact :</h4>
                        </div>

                        <hr>
                        
                        <?php 
                        
                        if(isset($_POST['save'])){

                            if(contactSave()){

                               linkTo('index.php') ;
                               

                            };

                        };

                        ?>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name" class="font-weight-bold text-primary">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo old("name") ; ?>" placeholder="Your Name" required>
                            <small class="text-danger font-weight-bold"><?php echo getError("name") ; ?></small>
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-primary font-weight-bold">Your Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo old('email') ; ?>" placeholder="Your Email" required>
                            <?php if(getError('email')){ ?>
                                <small class="text-danger font-weight-bold"><?php echo getError('email') ; ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="text-primary font-weight-bold">Your Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo old('phone') ; ?>" placeholder="Your Phone" required>
                            <?php if(getError('phone')){ ?>
                                <small class="text-danger font-weight-bold"><?php echo getError('phone') ; ?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="upload" class="text-primary font-weight-bold">Your Photo</label>
                            <input type="file" name="upload" id="upload" class="form-control p-1" value="<?php echo old('upload') ; ?>" required>
                            <?php if(getError('upload')){ ?>
                                <small class="text-danger font-weight-bold"><?php echo getError('upload') ; ?></small>
                            <?php } ?>
                        </div>

                        <hr>

                        <div class="form-row justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1"  required>
                                <label class="custom-control-label" for="customCheck1">It's Correct</label>
                            </div>
                            <button class="btn btn-primary" name="save" id="submit">Submit</button>
                        </div>

                    </form>
                    </div>
                </div>


                
            
            </div>
        </div>
    </div>


