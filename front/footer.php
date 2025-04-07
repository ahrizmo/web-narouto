		<footer class="bg-orange-500 text-black pr-5 h-25">

            <nav class="flex left-0 items-center justify-between w-full h-full ">

                <a href="./"><img src="./templates/images/logo.png" alt="Logo" class="h-25 "></a>
                <a class="navbar-brand" href="./contact">Nous Contacter</a>
                <a href="./mentions_legales">Mentions légales</a>

            </nav>
            <?php if(!isset($_COOKIE['mode'])){ ?>
            <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 flex flex-col sm:flex-row justify-between items-center z-50 shadow-lg" >
                <p class="text-sm 0mb-2 sm:mb-0">Ce site utilise des cookies pour améliorer votre expérience. En continuant, vous acceptez leur utilisation.
                    Pour en savoir plus, consultez notre <a href=./mentions_legales" class="underline text-blue-400 hover:text-blue-300">Politique de confidentialité</a>.
                </p>
                <form action="<?php echo $racine_path.'control/cookie.php'; ?>" method="POST">
                    <label for="mode">Dark</label>
                        <input type="range" id="mode" name="mode" min="0" max="1" value="0" step="1">
                    <span id="modeLabel">Red</span>
                    <button type ="submit" id="accept-cookies" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded ml-0 sm:ml-4">J'accepte</button>
                </form>
            </div>
            <?php }; ?>
		</footer>



        </body>
</html>