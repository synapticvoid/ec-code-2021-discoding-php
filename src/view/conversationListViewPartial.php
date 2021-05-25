<?php ob_start(); ?>
<div class="col-sm-6 col-md-3 friends-list">

    <ul class="list-group mt-3 mb-3">
        <li class="list-group-item">
            <a href="/index.php?action=friend">
                <i class="bi-people-fill mx-2"></i>Friends
            </a>
        </li>
    </ul>
    <ul class="list-group border-0">
        <? foreach ($conversations as $conv): ?>
            <li class="list-group-item border-0">

                <a href="/index.php?action=conversation&sub_action=detail&conversation_id=<?= $conv['id']; ?>"
                   class="list-group-item list-group-item-action border-0">
                    <?php
                    if ($conv['interlocutor_avatar_url']) {
                        $avatarUrl = $conv['interlocutor_avatar_url'];
                    } else {
                        $avatarUrl = "/static/lib/bootstrap-icons-1.5.0/person-fill.svg";
                    }
                    ?>
                    <img src="<?= $avatarUrl ?>" class="rounded-circle avatar-small mx-2"/>
                    <?= $conv['interlocutor_username']; ?>
                </a>
            </li>
        <? endforeach; ?>
    </ul>
</div>
<?php $conversation_list_content = ob_get_clean(); ?>
