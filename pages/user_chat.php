<div class="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>

<div id="chat">
    <div id="liste_conversations">
        <?php
            $req = $db->prepare('SELECT pseudo FROM users WHERE id IN (SELECT friend_id FROM friends WHERE user_id = :user AND status = 1)');
            $req->execute([
                'user' => $_SESSION['id']
            ]);
            $result = $req->fetchAll();
            for ($i = 0; $i < count($result); $i++) {
                echo "<div class='conversation' data-conversation='" . $result[$i]['pseudo'] . "'>" . $result[$i]['pseudo'] . "</div>";
            }
        ?>
    </div>
    <div id="conversation">
        <div id="attente" data="attend">
        </div>
        <div id="non_attente">
            <div id="block_scroll">
                <div id="messages">
                </div>
            </div>
            <div id="send_message">
                <input type="text" name="message" id="message" placeholder="Entrez votre message">
                <input type="button" name="input_send_message" data=0 id="input_send_message" value="Send">
            </div>
        </div>
    </div>
</div>