// JavaScript Document
function checkAddUserForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtUserName, 'Enter user name')) {
			return;
		} else if (isEmpty(txtPassword, 'Enter password')) {
			return;
		} else {
			submit();
		}
	}
}

function dTalk(TalkId)
{
	if (confirm('Delete this Talk?')) 
	{
		window.location.href = 'processTalk.php?action=delete&TalkId=' + TalkId;
	}
}


function addUser()
{
	window.location.href = 'index.php?view=add';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}




function deleteUser(userId)
{
	

if (confirm('Delete this user?')) {
		

window.location.href = 'processUser.php?action=delete&userId=' + userId;
	
}

}




