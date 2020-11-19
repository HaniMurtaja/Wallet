<?php $__env->startSection('content'); ?>
 <!-- start:form login -->
 <section class="panel panel-default">
 <header class="panel-heading text-center">
     <h3><b>DEPOSIT FROM CARD</b></h3>
 </header>
 <div class="panel-body ">
 <div class="row">
   <div class="col-md-8 col-md-offset-2">
     <form role="form" id="payment-form" action="<?php echo e(route('cardDeposit')); ?>" method="post">
        <div id="payment-error" class="alert alert-danger <?php echo e(!Session::has('error') ? 'hidden':''); ?>">
        <?php echo e(Session::get('error')); ?>

        </div>
         <div class="form-group">
             <label for="exampleInputEmail1">Credit Card Number</label>
             <input type="text" class="form-control" id="card-number" placeholder="Card Number">
         </div>
         <div class="row">
         <div class="col-md-6">
         <div class="form-group">
             <label for="exampleInputPassword1">Expiration Month</label>
             <input type="text" class="form-control" id="card-expiry-month" placeholder="Expiration Month">
         </div>
         <div class="form-group">
             <label for="exampleInputFile">Expiration Year</label>
             <input type="text" class="form-control" id="card-expiry-year" placeholder="Expiration Year">
         </div>

         </div>
         <div class="col-md-6">
         <div class="form-group">
             <label for="exampleInputFile">CVC</label>
             <input type="text" class="form-control" id="card-cvc" placeholder="CVC">
         </div>
         <div class="form-group">
             <label for="exampleInputFile">Amount to Deposit(USD)</label>
             <input type="text" class="form-control" name="card-amount" id="card-amount" placeholder="Amount">
         </div>
         </div>
         </div>
         <?php echo e(csrf_field()); ?>

         <button type="submit" class="btn btn-primary">Submit</button>
         
   </form>
</div>
</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://js.stripe.com/v3/" type="text/javascript"></script>
<script src="<?php echo e(asset('js/stripe.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('clients.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>