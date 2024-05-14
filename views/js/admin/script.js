function open_update_entries() {
  document.getElementById("edit_delete_content").style.display = "flex";
  document.getElementById("add_entries_content").style.display = "none";
}

function open_add_entries() {
  document.getElementById("add_entries_content").style.display = "flex";
  document.getElementById("edit_delete_content").style.display = "none";
}

function refresh() {
  location.reload();
}
