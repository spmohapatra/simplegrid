        <footer class="tcc">
            <insole class="tcc">
                <p>© 2010-<?php $motime=getdate(date("U"));
                        print("$motime[year]");?> 
                        <?php 
                        $mail="shibani@mohapatra.in"; 
                        $text="Shibani Prasad Mohapatra"; 
                        $css ="email"; 
                        if (function_exists('cryptx')) { 
                            cryptx($mail, $text, $css, 1); 
                        } else { 
                            echo sprintf('<a href="mailto:%s" class="%s">%s</a>', $mail, $css, ($text != "" ? $text : $mail)); 
                        } 
                        ?> 

                </p>
            </insole>
        </footer>
        
	</site>
	
	<?php wp_footer(); ?>