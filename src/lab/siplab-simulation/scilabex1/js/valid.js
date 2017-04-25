function delete_login(sno)
{
if(confirm("Do you want to delete the employee record"))
{
   this.document.admin.sno.value=sno;
this.document.admin.act.value="delete_login";
this.document.admin.submit();
}
}