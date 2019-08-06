<?php
require_once 'api/connect.php';

// Pobieranie postu
$post_Id = $_GET['id'];
$query = $link->query("SELECT * FROM posts WHERE id='$post_Id'");
$post = $query->fetch_assoc();

?>
 <div class="space40"></div>

    <section class="post-content">
        <div class="ui container">
            <div class="ui stackable grid">
                <div class="space30"></div>
                <div class="two wide column"></div>
                <div class="eight wide column">
                    <div class="row">
                        <div class="column">
                            <p class="date"><?php echo $post['post_date']; ?></p>
                            <h2 class="post-header"><?php echo $post['post_title']; ?></h2>
                            <img src="img/blog/posts/fot1.jpg" class="ui image post-image" alt="">
                            <p class="post-text"><?php echo $post['post_content']; ?></p>
                        </div>
                    </div>

                    <div class="ui minimal comments">
                        <h3 class="ui dividing header">Comments</h3>
                        <div class="comment">
                            <a class="avatar">
                            <img src="img/avatars/matt.jpg">
                            </a>
                            <div class="content">
                                <a class="author">Matt</a>
                                <div class="metadata">
                                    <span class="date">Today at 5:42PM</span>
                                </div>
                                <div class="text">
                                    How artistic!
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                            <img src="img/avatars/elliot.jpg">
                            </a>
                            <div class="content">
                                <a class="author">Elliot Fu</a>
                                <div class="metadata">
                                    <span class="date">Yesterday at 12:30AM</span>
                                </div>
                                <div class="text">
                                    <p>This has been very useful for my research. Thanks as well!</p>
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                            <div class="comments">
                                <div class="comment">
                                    <a class="avatar">
                                <img src="img/avatars/jenny.jpg">
                                </a>
                                    <div class="content">
                                        <a class="author">Jenny Hess</a>
                                        <div class="metadata">
                                            <span class="date">Just now</span>
                                        </div>
                                        <div class="text">
                                            Elliot you are always so right :)
                                        </div>
                                        <div class="actions">
                                            <a class="reply">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                            <img src="img/avatars/joe.jpg">
                            </a>
                            <div class="content">
                                <a class="author">Joe Henderson</a>
                                <div class="metadata">
                                    <span class="date">5 days ago</span>
                                </div>
                                <div class="text">
                                    Dude, this is awesome. Thanks so much
                                </div>
                                <div class="actions">
                                    <a class="reply">Reply</a>
                                </div>
                            </div>
                        </div>
                        <form class="ui reply form">
                            <div class="field">
                                <textarea></textarea>
                            </div>
                            <div class="ui blue labeled submit icon button">
                                <i class="icon edit"></i> Add Reply
                            </div>
                        </form>
                    </div>
                </div>
                <div class="one wide column"></div>

                <!-- Right Sidebar -->
                <div class="four wide column">
                    <div class="space50"></div>
                    <div class="ui segments">
                        <div class="ui segment">
                            <h2>Podobne wpisy</h2>
                        </div>
                        <div class="ui segment secondary  similar-posts">
                            <h3><a href="#">Prosto z Azji</a></h3>
                            <p class="similar-posts-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi architecto.</p>
                            <p class="date"><i class="calendar icon"></i> Lip 16, 2018</p>
                        </div>
                        <div class="ui segment secondary similar-posts">
                            <h3><a href="#">Koniec roku w Tajlandi</a></h3>
                            <p class="similar-posts-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <p class="date"><i class="calendar icon"></i> Cze 26, 2018</p>
                        </div>
                        <div class="ui segment secondary similar-posts">
                            <h3><a href="#">Tajskie zwyczaje przy stole</a></h3>
                            <p class="similar-posts-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi architecto.S</p>
                            <p class="date"><i class="calendar icon"></i> Maj 5, 2018</p>
                        </div>
                    </div>
                    <div class="ui segments">
                        <div class="ui segment">
                            <h2>Nowości w menu</h2>
                        </div>
                        <div class="ui segment secondary">
                            <div class="ui tiny images sidebarr">
                                <a href="#"><img class="ui image" src="img/sidebar1.jpg"></a>
                                <a href="#"><img class="ui image" src="img/sidebar2.jpg"></a>
                                <a href="#"><img class="ui image" src="img/sidebar2.jpg"></a>
                                <a href="#"><img class="ui image" src="img/sidebar3.jpg"></a>
                                <a href="#"><img class="ui image" src="img/sidebar1.jpg"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Right Sidebar -->


    </section>
    <div class="space40"></div>
