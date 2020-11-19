<?php $__env->startSection('content'); ?>

<div class="row" id="home-content">
                    <div class="col-lg-9">
                        <section class="panel">
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
                            <header class="panel-heading">
                               <b>Recent Transactions</b> 
                            </header>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Transaction #ID</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td><?php echo e($transaction->trans_id); ?></td>
                                        <td><?php echo e($transaction->created_at); ?></td>
                                        <td><?php echo e($transaction->type); ?></td>
                                        <td><?php echo e($transaction->amount); ?></td>
                                        <td><button class="btn btn-primary">Details</button></div></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </section>
                  
 
                        <!-- end:state overview -->

                      
                        <!-- start:timeline -->
                       
                        <!-- end:timeline -->
                    </div>
                    <div class="col-lg-3">
                        <!-- start:user info -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <header class="panel-title">
                                    <div class="text-center">
                                        <strong>Account Summary</strong>
                                    </div>
                                </header>
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <!-- <img src="img/user/avatar-3.jpg"> -->
                                    <h3>Balance</h3>
                                    <h2><?php echo e($acc_balance->balance); ?> USD</h2>
                                </div>
                            </div>
                        </div>
                        <!-- end:user info -->
                    </div>
                </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('clients.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>