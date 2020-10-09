/* <Ajax Object builder */

function inbox(item)
{
    XmlHttp
    (
        {
            url: 'customBackendScript.php',
            type: 'POST',
            data: "item="+item,
            complete:function(xhr,response,status)
            {
                document.write(response);
            }
        }
    );
}