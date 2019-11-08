
            <div class="footer-container">

                <footer class="container row">

                    <?php
                    
                        $categories = get_categories(array('number' => 7, 'parent' => 0, 'hide_empty' => false, 'exclude' => [1], 'orderby' => 'name', 'order' => 'ASC'));
                    ?>

                    <div class="left-block col-lg-6 row">

                        <div class="logo col-sm-6">

                            <a href="/" class="img"></a>

                            <div class="social d-flex">

                                <a href="https://vk.com/dspredannyh" class="vk" target="_blank"></a>
                                <a href="https://www.facebook.com/dspredannyh" class="fb" target="_blank"></a>
                                <a href="https://www.instagram.com/dspredannyh/?hl=ru" class="inst" target="_blank"></a>
                            </div>
                        </div>

                        <div class="about col-sm-6 d-flex">

                            <div class="title sub-h2">каталог</div>

                            <div class="items">

                                <?php for($i = 0; $i <= 4; $i++) { ?>

                                    <a href="<?php echo get_category_link($categories[$i]->term_id); ?>" class="item"><?php echo $categories[$i]->cat_name; ?></a>
                                <?php } ?>

                                <!--<a href="/dostavka-i-oplata/" class="item">Доставка и оплата</a>

                                <a href="/otzyvy/" class="item">Отзывы</a>-->
                            </div>
                        </div>
                    </div>

                    <div class="right-block col-lg-6 row">

                        <div class="catalog col-sm-6 d-flex">

                            <div class="title sub-h2">каталог</div>

                            <div class="items">

                                <?php for($i = 5; $i <= 6; $i++) { ?>

                                    <a href="<?php echo get_category_link($categories[$i]->term_id); ?>" class="item"><?php echo $categories[$i]->cat_name; ?></a>
                                <?php } ?>

                                <a href="/ouractions/" class="item">Акции</a>

                                <a href="/ournews/" class="item">Новинки</a>
                            </div>
                        </div>
                        
                        <div class="contacts col-sm-6 d-flex">

                            <div class="title sub-h2">контакты</div>

                            <div class="items">

                                <a href="tel:88003500261" class="item phone">
                                    
                                    8 800 350 02 61

                                    <span>звонок по России бесплатно</span>
                                </a>

                                <div class="item"><?php echo get_bloginfo('admin_email'); ?></div>
                            </div>

                            <!-- <div class="write-us">

                                <div class="title">Напишите нам:</div>

                                <div class="viber write-us-btn">Viber</div>

                                <div class="whatsapp write-us-btn">Whatsapp</div>
                            </div> -->
                        </div>
                    </div>

                    <div class="copir">
                        
                        <div class="rules">
                            
                            <div class="text">Все права защищены. 2019</div>
                        </div>

                        <div class="conf"><a href="/policy/" class="text">Политика конфиденциальности</a></div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="contact-form-modal-cover"></div>
        <div id="contact-form-modal">

            <div class="sub-title">Мы всегда готовы помочь с выбором</div>

            <div class="desc">

            Подберем товар под ваши задачи. Проконсультируем и быстро отправим заказ.<br>
            Консультация бесплатна и ни к чему вас не обязывает.
            </div>

            <form>

                <div class="inputs row">

                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="contact-form-modal-name" placeholder="Имя" name="name-string-!">
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="contact-form-modal-phone" placeholder="Телефон" name="phone-phone-*">
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="contact-form-modal-text" placeholder="Комментарии или пожелания" name="text-text-!"></textarea>
                </div>

                <button type="submit" class="square-btn form_submit_btn">ОТПРАВИТЬ ДАННЫЕ</button>

                <input type="hidden" name="subject-string-*" value="Заявка на обратный звонок">
                
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="contact-form-modal-check" name="captcha-captcha-*">
                    <label class="form-check-label" for="contact-form-modal-check">Согласен с политикой конфиденциальности</label>
                </div>
            </form>

            <div class="close"></div>
        </div>
        <div id="contact-form-modal-btn"><span>Перезвоните мне</span></div>

        <?php wp_footer() ?>
    </body>
</html>