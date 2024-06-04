<?php
    $module = 'chats';
    $title = 'Чат';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="col app-chat-history">
        <div class="chat-history-wrapper">
            <div class="chat-history-header border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex overflow-hidden align-items-center">
                        <i class="bx bx-menu bx-sm cursor-pointer d-lg-none d-block me-2" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
                        <div class="flex-shrink-0 avatar">
                            <img src="<?php echo e($record->user->image_path ? $record->user->image_path : asset('assets/img/no-image.png')); ?>" alt="Avatar" class="rounded-circle" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-sidebar-right">
                        </div>
                        <div class="chat-contact-info flex-grow-1 ms-3">
                            <h6 class="m-0"><?php echo e($record->user->name); ?> <?php echo e($record->user->surname); ?></h6>
                            <small class="user-status text-muted">Online</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="chat-header-actions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded fs-4"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                                <a class="dropdown-item" href="javascript:void(0);">Просмотр страницы</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-history-body">
                <ul class="list-unstyled chat-history mb-0">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="chat-message <?php if($message->user->id == $record->user->id): ?> chat-message-right <?php endif; ?>">
                            <div class="d-flex overflow-hidden">
                                <div class="chat-message-wrapper flex-grow-1 <?php if($message->user->id == $record->user->id): ?> d-flex justify-content-end <?php endif; ?>">
                                    <div>
                                        <div class="chat-message-text">
                                            <p class="mb-0"><?php echo e($message->message); ?></p>
                                        </div>
                                        <div class="<?php if($message->user->id == $record->user->id): ?> text-end <?php endif; ?> text-muted mt-1">
                                            <i class="bx bx-check-double text-success"></i>
                                            <small><?php echo e($message->created_at->format('H:i')); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($message->user->id == $record->user->id): ?>
                                    <div class="user-avatar flex-shrink-0 ms-3">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php echo e(Auth::user()->image_path ? Auth::user()->image_path : asset('assets/img/no-image.png')); ?>" alt="Avatar" class="rounded-circle">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="ps__rail-x" style="left: 0px; bottom: -394px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 394px; height: 370px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 106px; height: 100px;"></div>
                </div>
            </div>
            <!-- Chat message form -->
            <div class="chat-history-footer">
                <form class="form-send-message d-flex justify-content-between align-items-center" action="<?php echo e(route('messages.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="note_id" value="<?php echo e($record->id); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($record->user->id); ?>">
                    <input class="form-control message-input border-0 me-3 shadow-none" name="message" placeholder="Введите сообщение..." required>
                    <div class="message-actions d-flex align-items-center">
                        <button class="btn btn-primary d-flex send-msg-btn" type="submit">
                            <i class="bx bx-paper-plane me-md-1 me-0"></i>
                            <span class="align-middle d-md-inline-block d-none">Отправить</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .app-chat-history {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .chat-history-wrapper {
            display: flex;
            flex-direction: column;
            height: 80vh;
        }

        .chat-history-header {
            padding: 15px;
            background: #f8f9fa;
        }

        .chat-history-body {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            background: #fff;
        }

        .chat-message {
            margin-bottom: 15px;
        }

        .chat-message-right .chat-message-wrapper {
            text-align: right;
        }

        .chat-message .chat-message-text {
            background: #f1f1f1;
            padding: 10px;
            width: fit-content;
            border-radius: 10px;
            word-break: break-word; /* Add this to handle long words */
            overflow-wrap: break-word; /* Add this to handle long words */
            max-width: 400px;
        }

        .chat-message-right .chat-message-text {
            background: #d1ecf1;
        }

        .chat-message .text-muted {
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .chat-history-footer {
            padding: 15px;
            background: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }

        .form-send-message {
            display: flex;
            align-items: center;
        }

        .form-send-message .message-input {
            flex: 1;
            resize: none;
        }

        .form-send-message .message-actions {
            display: flex;
            align-items: center;
        }

        .form-send-message .message-actions .bx {
            font-size: 1.25rem;
        }

    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chatBody = document.querySelector('.chat-history-body');
            chatBody.scrollTop = chatBody.scrollHeight;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/chat/show.blade.php ENDPATH**/ ?>