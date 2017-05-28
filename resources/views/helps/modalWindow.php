Modals modal.js

Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.

Multiple open modals not supported
Be sure not to open a modal while another is still visible. Showing more than one modal at a time requires custom code.
Modal markup placement
Always try to place a modal's HTML code in a top-level position in your document to avoid other components affecting the modal's appearance and/or functionality.
Mobile device caveats
There are some caveats regarding using modals on mobile devices. See our browser support docs for details.
Due to how HTML5 defines its semantics, the autofocus HTML attribute has no effect in Bootstrap modals. To achieve the same effect, use some custom JavaScript:

Copy
$('#myModal').on('shown.bs.modal', function () {
$('#myInput').focus()
})
Examples
Static example
A rendered modal with header, body, and set of actions in the footer.

×
Modal title
One fine body…

Close Save changes
Copy
<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->