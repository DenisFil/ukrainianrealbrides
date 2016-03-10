<div class="content-wrapper">
    <div class="chat-holder">
        <h2>Chat</h2>
        <div class="chat-content">
            <div class="chat-sidebar">

                <!-- Chat TABS -->
                <div class="chat-tabs">
                    <!-- Tabs nav -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#online-tab" aria-controls="online-tab" role="tab" data-toggle="tab"
                               class="first-chat-tab">Online</a>
                        </li>
                        <li role="presentation">
                            <a href="#favorites-tab" aria-controls="favorites-tab" role="tab"
                               data-toggle="tab">Favorites</a>
                        </li>
                        <li role="presentation">
                            <a href="#history-tab" aria-controls="history-tab" role="tab" data-toggle="tab">History</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="active tab-pane" id="online-tab">
                            <div class="tab-body">
                                <?php foreach ($users_online as $value): ?>
                                    <div class="dialog-partner" id="<?php echo $value->id; ?>">
                                        <div class="new-message-count">
                                            <em></em>
                                            <span>0</span>
                                        </div>
                                        <div class="dialog-partner-left">
                                            <a href="#photo-modal" role="button" data-toggle="modal"
                                               class="dialog-partner-avatar">
                                                <img
                                                    src="<?php echo base_url(); ?>content/profiles/avatars/<?php echo $value->id; ?>/<?php echo $value->avatar; ?>_preview.jpg"
                                                    width="35" height="35">
                                                <span class="chat-avatar-status online-avatar-status"></span>
                                            </a>
                                            <div class="dialog-partner-info">
                                                <a href="<?php echo base_url(); ?>user_interface/user_profile_preview?id=<?php echo $value->id; ?>"
                                                   target="_blank"><?php echo $value->name; ?></a>
                                                <em>
                                                    <?php if ($value->city != NULL): ?>
                                                        <?php $country = $value->country_name . ', ' . $value->city; ?>
                                                    <?php else: ?>
                                                        <?php $country = $value->country_name; ?>
                                                    <?php endif; ?>
                                                    <?php echo $country; ?>
                                                </em>
                                            </div>
                                        </div>
                                        <div class="dialog-partner-right">
                                            <button class="start-dialog" id="13">Start a dialogue</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                                <!--<div class="dialog-partner active-dialog">
                                <div class="new-message-count">
                                    <em></em>
                                    <span>0</span>
                                </div>
                                <div class="dialog-partner-left">
                                    <button class="dialog-partner-avatar">
                                        <img
                                            src="<?php /*echo base_url(); */ ?>content/user_interface/img/chat/profile-mini.png"
                                            width="35" height="35">
                                        <span class="chat-avatar-status offline-avatar-status"></span>
                                    </button>
                                    <div class="dialog-partner-info">
                                        <a href="#">Marina</a>
                                        <em>Ukraine, Kharkiv</em>
                                    </div>
                                </div>
                                <div class="dialog-partner-right">
                                    <span>10:23</span>
                                    <button class="stop-dialog">Stop</button>
                                </div>
                            </div>
                            <div class="dialog-partner">
                                <div class="new-message-count">
                                    <em></em>
                                    <span>0</span>
                                </div>
                                <div class="dialog-partner-left">
                                    <button class="dialog-partner-avatar offline-avatar-status">
                                        <img
                                            src="<?php /*echo base_url(); */ ?>content/user_interface/img/chat/profile-mini.png"
                                            width="35" height="35">
                                        <span class="chat-avatar-status offline-avatar-status"></span>
                                    </button>
                                    <div class="dialog-partner-info">
                                        <a href="#">Ira</a>
                                        <em>Ukraine, Lviv</em>
                                    </div>
                                </div>
                                <div class="dialog-partner-right">
                                    <button class="start-dialog">Start a dialogue</button>
                                </div>
                            </div>
                            <div class="dialog-partner">
                                <div class="new-message-count">
                                    <em></em>
                                    <span>0</span>
                                </div>
                                <div class="dialog-partner-left">
                                    <button class="dialog-partner-avatar offline-avatar-status">
                                        <img
                                            src="<?php /*echo base_url(); */ ?>content/user_interface/img/chat/profile-mini.png"
                                            width="35" height="35">
                                        <span class="chat-avatar-status online-avatar-status"></span>
                                    </button>
                                    <div class="dialog-partner-info">
                                        <a href="#">Ekaterina</a>
                                        <em>Ukraine, Kiev</em>
                                    </div>
                                </div>
                                <div class="dialog-partner-right">
                                    <button class="start-dialog">Start a dialogue</button>
                                </div>
                            </div>
                            <div class="dialog-partner">
                                <div class="new-message-count new-message-active">
                                    <em></em>
                                    <span>7</span>
                                </div>
                                <div class="dialog-partner-left">
                                    <button class="dialog-partner-avatar">
                                        <img
                                            src="<?php /*echo base_url(); */ ?>content/user_interface/img/chat/profile-mini.png"
                                            width="35" height="35">
                                        <span class="chat-avatar-status online-avatar-status"></span>
                                    </button>
                                    <div class="dialog-partner-info">
                                        <a href="#">Olga</a>
                                        <em>Ukraine, Zaporozhye</em>
                                    </div>
                                </div>
                                <div class="dialog-partner-right">
                                    <span>7:17</span>
                                    <button class="stop-dialog">Stop</button>
                                </div>
                            </div>
                            <div class="dialog-partner">
                                <div class="new-message-count">
                                    <em></em>
                                    <span>0</span>
                                </div>
                                <div class="dialog-partner-left">
                                    <button class="dialog-partner-avatar">
                                        <img
                                            src="<?php /*echo base_url(); */ ?>content/user_interface/img/chat/profile-mini.png"
                                            width="35" height="35">
                                        <span class="chat-avatar-status online-avatar-status"></span>
                                    </button>
                                    <div class="dialog-partner-info">
                                        <a href="#">Natasha</a>
                                        <em>Ukraine, Kharkiv</em>
                                    </div>
                                </div>
                                <div class="dialog-partner-right">
                                    <button class="start-dialog">Start a dialogue</button>
                                </div>
                            </div>
                            <div class="dialog-partner">
                                <div class="new-message-count">
                                    <em></em>
                                    <span>0</span>
                                </div>
                                <div class="dialog-partner-left">
                                    <button class="dialog-partner-avatar offline-avatar-status">
                                        <img
                                            src="<?php /*echo base_url(); */ ?>content/user_interface/img/chat/profile-mini.png"
                                            width="35" height="35">
                                        <span class="chat-avatar-status online-avatar-status"></span>
                                    </button>
                                    <div class="dialog-partner-info">
                                        <a href="#">Ira</a>
                                        <em>Ukraine, Lviv</em>
                                    </div>
                                </div>
                                <div class="dialog-partner-right">
                                    <button class="start-dialog">Start a dialogue</button>
                                </div>
                            </div>-->
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="favorites-tab">
                            <div class="tab-body">
                                <div class="dialog-partner">
                                    <div class="new-message-count">
                                        <em></em>
                                        <span>0</span>
                                    </div>
                                    <div class="dialog-partner-left">
                                        <button class="dialog-partner-avatar offline-avatar-status">
                                            <img
                                                src="<?php echo base_url(); ?>content/user_interface/img/chat/profile-mini.png"
                                                width="35" height="35">
                                            <span class="chat-avatar-status online-avatar-status"></span>
                                        </button>
                                        <div class="dialog-partner-info">
                                            <a href="#">Ira</a>
                                            <em>Ukraine, Lviv</em>
                                        </div>
                                    </div>
                                    <div class="dialog-partner-right">
                                        <button class="start-dialog">Start a dialogue</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="history-tab">
                            <div class="tab-body">
                                <div class="dialog-partner">
                                    <div class="new-message-count">
                                        <em></em>
                                        <span>0</span>
                                    </div>
                                    <div class="dialog-partner-left">
                                        <button class="dialog-partner-avatar offline-avatar-status">
                                            <img
                                                src="<?php echo base_url(); ?>content/user_interface/img/chat/profile-mini.png"
                                                width="35" height="35">
                                            <span class="chat-avatar-status online-avatar-status"></span>
                                        </button>
                                        <div class="dialog-partner-info">
                                            <a href="#">Ira</a>
                                            <em>Ukraine, Lviv</em>
                                        </div>
                                    </div>
                                    <div class="dialog-partner-right">
                                        <button class="start-dialog">Start a dialogue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chat TABS END -->
            </div>
            <div class="chat-body">
                <div class="chat-body-header">
                    <div class="chat-header-left">
                        <a href="#photo-modal" role="button" data-toggle="modal" class="chat-partner-avatar">
                            <img src="" width="35" height="35">
                            <span class="chat-avatar-status online-avatar-status"></span>
                        </a>
                        <div class="chat-partner-info">
                            <div class="chat-partner-name">
                                <button type="button"><img
                                        src="<?php echo base_url(); ?>content/user_interface/img/chat/add-favorite.png"
                                        width="15" height="20"></button>
                                <a href="" class="name-href" target="_blank"></a>
                            </div>
                            <em></em>
                            <span>Online</span>
                        </div>
                    </div>

                    <div class="chat-header-right">
                        <a href="#" class="chat-header-nav send-gift-button">
                            <img src="<?php echo base_url(); ?>content/user_interface/img/main/gift-service.png"
                                 width="27"
                                 height="36" alt="Send gift"/>
                            <span>Send Gift</span>
                        </a>
                        <a href="#" class="chat-header-nav">
                            <img src="<?php echo base_url(); ?>content/user_interface/img/main/video-chat.png"
                                 width="35"
                                 height="32" alt="Video chat"/>
                            <span>Video chat</span>
                        </a>
                    </div>
                </div>
                <div class="chat-field">
                    <!--<div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message incoming-message">I'm a tooltip! Or am I a speech bubble? I'm a tooltip! Or am I a speech.</span>
                        </div>
                        <span class="chat-row-right">14:10</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message outgoing-message">Or am I a speech</span>
                        </div>
                        <span class="chat-row-right">14:12</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message outgoing-message">I'm a tooltip! Or am I a speech bubble? Or am I a speech</span>
                        </div>
                        <span class="chat-row-right">14:16</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message incoming-message">I'm a tooltip! Or am I a speech bubble?</span>
                        </div>
                        <span class="chat-row-right">14:18</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message outgoing-message">I'm a tooltip! Or am I a speech bubble?</span>
                        </div>
                        <span class="chat-row-right">14:20</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message incoming-message">I'm a tooltip! Or am I a speech bubble? Or am I a speech</span>
                        </div>
                        <span class="chat-row-right">14:16</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message outgoing-message">I'm a tooltip! Or am I a speech bubble?</span>
                        </div>
                        <span class="chat-row-right">14:18</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message incoming-message">I'm a tooltip! Or am I a speech bubble?</span>
                        </div>
                        <span class="chat-row-right">14:20</span>
                    </div>
                    <div class="chat-field-row">
                        <div class="chat-row-left">
                            <span class="chat-message incoming-message">I'm a tooltip! Or am I a speech bubble?</span>
                        </div>
                        <span class="chat-row-right">14:20</span>
                    </div>-->
                </div>
                <div class="chat-body-footer">
                    <form action="#">
                    <textarea placeholder="Write your message" data-autoresize class="message-field" cols="1" rows="1"
                              id="#"></textarea>
                    </form>
                    <div class="chat-footer-right">
                        <button type="button" class="emoji-launch">
                            <img src="<?php echo base_url(); ?>content/user_interface/img/chat/emoji-ico.png" width="21"
                                 height="21">
                            <div class="emoji-block">
                                <img src="<?php echo base_url(); ?>content/user_interface/img/chat/emoji.png" width="20"
                                     height="20">
                                <img src="<?php echo base_url(); ?>content/user_interface/img/chat/emoji.png" width="20"
                                     height="20">
                                <img src="<?php echo base_url(); ?>content/user_interface/img/chat/emoji.png" width="20"
                                     height="20">
                                <img src="<?php echo base_url(); ?>content/user_interface/img/chat/emoji.png" width="20"
                                     height="20">
                                <img src="<?php echo base_url(); ?>content/user_interface/img/chat/emoji.png" width="20"
                                     height="20">
                            </div>
                        </button>
                        <button type="button" class="send-message-button">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Photo modal-->
    <div class="modal fade" id="photo-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="exit" data-dismiss="modal" aria-hidden="true"></button>
                    <span></span>
                    <img src="" alt="Photo gallery" id="user-photo"/>
                </div>
            </div>
        </div>
    </div>
    <!--Photo modal END-->

