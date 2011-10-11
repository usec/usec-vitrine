/**
 * Contient les fonctions persos
 *
 */

/**
* Cache l'éditeur au début
*/
$(function()
{
	$( "#dialog-supress" ).dialog({
		autoOpen: false,
		modal: true,
		show: "blind",
		hide: "explode",
		height:140,
		modal: true,
		buttons: {
			"Supprimer": function() {
				supressPage(); // supression de la page courant
				$( this ).dialog( "close" ); // fermeture de la dialog
				window.location.replace(url_accueil); // redirection
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		}
	});

	$( "#dialog-add" ).dialog({
		autoOpen: false,
		modal: true,
		buttons: {
			"Ajouter une page": function() {
				filename = $( "#editor_new_filename" );
				rubrique = $( "#editor_new_rubrique" );
				allFields = $( [] ).add( filename ).add( rubrique );
				allFields.removeClass( "ui-state-error" );
				addPage();
				$( this ).dialog( "close" );
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		},
		close: function() {
			allFields.val( "" ).removeClass( "ui-state-error" );
		}
	});

	$( "dialog-add form" ).ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
});


function updateTips( t ) {
	$( ".validateTips" ).text( t ).addClass( "ui-state-highlight" );
	setTimeout(function() {
		$( ".validateTips" ).removeClass( "ui-state-highlight", 1500 );
	}, 500 );
}


/**
 * Affiche l'éditeur
 */
function showEditor()
{
	$('#editor').show();
}

/**
 * Cache l'éditeur
 */
function hideEditor()
{
	$('#editor').hide();
}

/**
 * Sauvegarder le menu
 */
function saveMenu()
{
	rubriques = $('.rubrique');
	var tabOrder = {};
	var i = 0;
	$('.rubrique').each(function() {
		tabOrder[$(this).html()] = i;
		i++;
	});
	jQuery.post(
		"ajax/save_menu.php",
		{"order": tabOrder},
		function(data) {
			$('#result_ajax').html(data);
		}
	);
}

function askAddPage()
{
	$( "#dialog-add" ).dialog( "open" );
}

function addPage()
{
	jQuery.post(
		"ajax/add_page.php",
		{"filename": $('#editor_new_filename').val(),
		"rubrique": $('#editor_new_rubrique').val(),
		"show": $('#editor_new_show').is(':checked'),
		},
		function(data) {
			$('#result_ajax').html(data);
		}
	);
}

function askSupressPage()
{
	$( "#dialog-supress" ).dialog( "open" );
}

/**
 * Suppression d'une page
 */
function supressPage()
{
	jQuery.post(
		"ajax/delete_rubrique.php",
		{"filename": $('#current_filename').html()},
		function(data) {
			$('#result_ajax').html(data);
		}
	);
}


function savePage()
{
	jQuery.post(
		"ajax/save_page.php",
		{"filename": $('#current_filename').html(),"content": $('#content').html() },
		function(data) {
			$('#result_ajax').html(data);
		}
	);
}



