<?php

require_once('model/conversation.php');
require_once('model/message.php');

function conversationPage()
{
    $user_id = $_SESSION['user_id'] ?? false;
    if (!$user_id) {
        require('view/loginView.php');
        return;
    }

    if (!isset($_GET['sub_action'])) {
        require('view/friendView.php');
        return;
    }

    switch ($_GET['sub_action']) {
        case 'start_with_user':
            getOrCreateConversationWithUser($user_id);
            break;
        case 'detail':
            conversationDetail($user_id);
            break;
        case 'add_message':
            addMessage($user_id);
            break;
    }
}

function getOrCreateConversationWithUser($user_id)
{
    $user_id2 = $_GET['interlocutor_id'] ?? 0;
    $conversation_id = Conversation::getConversationIdBetweenUsers($user_id, $user_id2);

    if ($conversation_id <= 0) {
        $conversation_id = Conversation::createConversationBetweenUsers($user_id, $user_id2);
    }
    header('Location: index.php?action=conversation&sub_action=detail&conversation_id=' . $conversation_id);

}

function conversationDetail($user_id)
{
    $conversation_id = $_GET['conversation_id'];
    $conversation = Conversation::getConversationForUser($conversation_id, $user_id);
    $messages = Message::getMessagesForConversationId($conversation_id);
    $user = User::getUserById($user_id);
    $interlocutor = User::getUserById($conversation['interlocutor_id']);
    $conversation_list_partial = conversationListPartial($user_id);
    require('view/conversationView.php');
}

function conversationListPartial($user_id)
{

    $conversations = Conversation::getAllConversationsForUser($user_id);
    $conversation_list_content = '';
    require('view/conversationListViewPartial.php');
    return $conversation_list_content;
}

function addMessage($user_id)
{
    $conversation_id = $_GET['conversation_id'];
    $conversation = Conversation::getConversationForUser($conversation_id, $user_id);
    $content = $_POST['content'];
    $message = new Message();
    $message->setConversationId($conversation_id);
    $message->setUserId($user_id);
    $message->setContent($content);
    Message::createMessage($message);

    header('Location: /index.php?action=conversation&sub_action=detail&conversation_id=' . $conversation_id);
}
