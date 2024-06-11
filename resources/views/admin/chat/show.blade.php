@extends('admin.layouts.index')
@php
    $module = 'chats';
    $title = 'Чат';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col app-chat-history">
        <div class="chat-history-wrapper">
            <div class="chat-history-header border-bottom">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex overflow-hidden align-items-center">
                        <i class="bx bx-menu bx-sm cursor-pointer d-lg-none d-block me-2" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
                        <div class="flex-shrink-0 avatar">
                            <img src="{{ $record->user->image_path ? $record->user->image_path : asset('assets/img/no-image.png') }}" alt="Avatar" class="rounded-circle" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-sidebar-right">
                        </div>
                        <div class="chat-contact-info flex-grow-1 ms-3">
                            <h6 class="m-0">{{ $record->user->name }}</h6>
                            <small class="user-status text-muted">Online</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="chat-header-actions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded fs-4"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                                <form action="{{ route('noteAccess.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="asked_for_user_id" value="{{ $record->user->id }}">
                                    <input type="hidden" name="asking_user_id" value="{{ Auth::user()->id }}">

                                    @if($recordQuantity == 0)
                                    <button type="submit" class="dropdown-item">Запросить на просмотр</button>
                                    @endif
                                </form>
                                @if($recordAccess > 0)
                                    <a class="dropdown-item" href="{{ route('users.show', $record->user->id) }}">Просмотр страницы</a>
                                @endif
                                @if($recordAccess == 0 && $recordQuantity != 0)
                                    <button type="button" class="dropdown-item">Запрос на ожидании</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-history-body">
                <ul class="list-unstyled chat-history mb-0" id="chat-messages">
                    @foreach($messages as $message)
                        <li class="chat-message @if(Auth::user()->organization_id == $message->user->organization_id) chat-message-right @endif">
                            <div class="d-flex overflow-hidden">
                                <div class="chat-message-wrapper flex-grow-1 @if(Auth::user()->organization_id == $message->user->organization_id) d-flex justify-content-end @endif">
                                    <div>
                                        <div class="w-100 d-flex @if(Auth::user()->organization_id == $message->user->organization_id) justify-content-end @endif">
                                            <div class="chat-message-text">
                                                <p class="mb-0">{{ $message->message }}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-1 @if(Auth::user()->organization_id == $message->user->organization_id) justify-content-end @endif text-muted">
                                            <small class="me-1">{{ $message->created_at->format('H:i') }}</small>
                                            @if(Auth::user()->organization_id == $message->user->organization_id) <i class="bx bx-check text-success"></i> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
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
                <form action="{{ route('messages.store') }}" id="send-message-form" class="form-send-message d-flex justify-content-between align-items-center" method="POST">
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $record->id }}">
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
            word-break: break-word;
            overflow-wrap: break-word;
            max-width: 400px;
        }

        .chat-message-right .chat-message-text {
            background: #d1ecf1;
            text-align: right;
        }

        .chat-message .text-muted {
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .chat-message .text-muted small {
            margin-right: 5px;
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

    <script src="/build/assets/app-cCFabYt-.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var chatBody = document.querySelector('.chat-history-body');
            chatBody.scrollTop = chatBody.scrollHeight;

            $('#send-message-form').on('submit', function(event) {
                event.preventDefault();
                var form = $(this);
                var formData = form.serialize();

                var now = new Date();
                var formattedTime = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
                var newMessage = `
                <li class="chat-message chat-message-right">
                    <div class="d-flex overflow-hidden">
                        <div class="chat-message-wrapper flex-grow-1 d-flex justify-content-end">
                            <div>
                                <div class="w-100 d-flex justify-content-end">
                                    <div class="chat-message-text">
                                        <p class="mb-0">${$('input[name="message"]').val()}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-1 justify-content-end text-muted">
                                    <small class="me-1">${formattedTime}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`;
                $('#chat-messages').append(newMessage);
                $('input[name="message"]').val('');
                chatBody.scrollTop = chatBody.scrollHeight;

                $.ajax({
                    url: '{{ route('messages.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        var lastMessage = $('#chat-messages').children().last();
                        lastMessage.find('.text-muted').append('<i class="bx bx-check text-success"></i>');
                        form.trigger('reset');
                    },
                    error: function(response) {
                        alert('Ошибка при отправке сообщения');
                    }
                });
            });

            Echo.channel('chat.{{ $record->id }}')
                .listen('MessageSent', (e) => {
                    if (e.message.user_id !== {{ Auth::user()->id }}) {
                        var receivedMessage = `
                        <li class="chat-message">
                            <div class="d-flex overflow-hidden">
                                <div class="chat-message-wrapper flex-grow-1">
                                    <div>
                                        <div class="w-100 d-flex">
                                            <div class="chat-message-text">
                                                <p class="mb-0">${e.message.message}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-1 text-muted">
                                            <small class="me-1">${e.message.created_at}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>`;
                        $('#chat-messages').append(receivedMessage);
                        chatBody.scrollTop = chatBody.scrollHeight;
                    }
                });
        });
    </script>

@endsection
