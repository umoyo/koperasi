<?php $__env->startSection('content'); ?>

<div class="row justify-content-center">
<dic class="card col-sm-4 ">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('superadmin.login.submit')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-11 control-label">E-Mail Address</label>

                            <div class="col-md-11">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-11 control-label">Password</label>

                            <div class="col-md-11">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <center>
<div class="form-group">
                            <div class="" >
<div class="g-recaptcha" data-sitekey="6LcW5i4UAAAAAHi_DXqUJdFe1uAFzSWoik-5ClXT"></div>
<?php if($errors->has('g-recaptcha-response')): ?>
 <span class="help-block">
 <strong> Recaptcha diperlukan</strong>
 </span>
 <?php endif; ?>
                            </div>
                        </div>
</center>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            </div>
                        </div>
                    </form>

                    </div>
                    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koperasi\resources\views/auth/super-admin-login.blade.php ENDPATH**/ ?>