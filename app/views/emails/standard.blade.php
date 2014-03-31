@extend('mail.layout.main')

@section('content')

<table border="0" cellpadding="0" cellspacing="0" width="400">
    <tr>
        <td valign="top" width="180" class="leftColumnContent">

            <!-- // Begin Module: Top Image with Content \\ -->
            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                <tr mc:repeatable>
                    <td valign="top">
                        <img src="http://gallery.mailchimp.com/653153ae841fd11de66ad181a/images/placeholder_160.gif" style="max-width:160px;" mc:label="image" mc:edit="tiwc200_image01" />
                        <div mc:edit="tiwc200_content01">
                            <h4 class="h4">Heading 4</h4>
                            <strong>Repeatable content blocks:</strong> Repeatable sections are noted with plus and minus signs so that you can add and subtract content blocks. You can also <a href="http://www.mailchimp.com/kb/article/how-do-i-work-with-repeatable-content-blocks" target="_blank">get a little fancy</a>: repeat blocks and remove all text to make image "gallery" sections, or do the opposite and remove images for text-only blocks!
                        </div>
                    </td>
                </tr>
            </table>
            <!-- // End Module: Top Image with Content \\ -->

        </td>
        <td valign="top" width="180" class="rightColumnContent">

            <!-- // Begin Module: Top Image with Content \\ -->
            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                <tr mc:repeatable>
                    <td valign="top">
                        <img src="http://gallery.mailchimp.com/653153ae841fd11de66ad181a/images/placeholder_160.gif" style="max-width:160px;" mc:label="image" mc:edit="tiwc200_image02" />
                        <div mc:edit="tiwc200_content02">
                            <h4 class="h4">Heading 4</h4>
                            <strong>Repeatable content blocks:</strong> Repeatable sections are noted with plus and minus signs so that you can add and subtract content blocks. You can also <a href="http://www.mailchimp.com/kb/article/how-do-i-work-with-repeatable-content-blocks" target="_blank">get a little fancy</a>: repeat blocks and remove all text to make image "gallery" sections, or do the opposite and remove images for text-only blocks!
                        </div>
                    </td>
                </tr>
            </table>
            <!-- // End Module: Top Image with Content \\ -->

        </td>
    </tr>
</table>

@stop