<?php $__env->startSection('content'); ?>
 <!-- start:form login -->
            <section class="panel panel-default">
                <?php if($message = Session::get('success')): ?>
                            <div class="custom-alerts alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <?php echo $message; ?>

                            </div>
                            <?php Session::forget('success');?>
                            <?php endif; ?>

                            <?php if($message = Session::get('error')): ?>
                            <div class="custom-alerts alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <?php echo $message; ?>

                            </div>
                            <?php Session::forget('error');?>
                            <?php endif; ?>
                                    <header class="panel-heading text-center">
                                        <h3><b>SEND MONEY</b></h3>
                                    </header>
                                    <div class="panel-body ">
                                    <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <form role="form" id="payment-form" action="<?php echo e(route('send')); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                            <div id="payment-error" class="alert alert-danger <?php echo e(!Session::has('error') ? 'hidden':''); ?>">
                                            <?php echo e(Session::get('error')); ?>

                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Receiver Contacts</label>
                                                <input type="text" class="form-control" name="contact" placeholder="e.g 254702244756">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Amount</label>
                                                <input type="text" class="form-control" name="amount" placeholder="amount to send">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Description</label>
                                                <textarea class="form-control" name="description" id="description" placeholder="short description"></textarea>
                                            
                                            </div>
                                            <div class="form-group">
                                            <button type="submit" class="btn btn-primary">SEND MONEY</button>
                                            </div>
                                            </div>
                                            
                                            
                                            
                                    </form>
                                    </div>
                                    </div>
                                    </div>
                                    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('clients.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>