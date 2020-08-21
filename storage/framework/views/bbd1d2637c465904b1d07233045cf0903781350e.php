<?php $__env->startSection('content'); ?>


    <div class="container-fluid app-body app-home">

        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo e(url('search-posts')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-md-3">
                            <input type="text" name="searchText" required>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="searchDate" required>
                        </div>
                        <div class="col-md-3">
                            <select name="searchGroup" required>

                                <?php $__currentLoopData = $groupTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($types->type); ?>">
                                        <?php echo e($types->type); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th scope="col">Group Name</th>
                        <th scope="col">Group Type</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Post Text</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $bufferPosting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($posting->groupInfo->name); ?></td>
                        <td><?php echo e($posting->groupInfo->type); ?></td>
                        <td><img style="height:65px !important" src="<?php echo e($posting->accountInfo->avatar); ?>"
                                 class="center-block img-circle img-responsive"></td>
                        <td><?php echo e($posting->post_text); ?></td>
                        <td><?php echo e($posting->created_at->format('M D Y, h:mm:ss a')); ?></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <?php echo e($bufferPosting->links()); ?>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>