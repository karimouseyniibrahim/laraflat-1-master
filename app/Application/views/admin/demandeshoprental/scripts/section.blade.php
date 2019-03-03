<script type="text/javascript">
        $('#section_id').on('change',function(){
            var section=$(this).val();

            if (section!='') {
                $.get("{{concatenateLangToUrl('admin/getshoprental')}}"+'/'+section,function(res){
                    var json=JSON.parse(res);
                    var out='';
                    $.each(json,function(key,value){
                        out+='<option value="'+key+'">'+value+'</option>'
                    });
                    $('#shoprental_id').html(out);
                    $('#shoprental_id').selectpicker('refresh');                     
                });                
            }
        });
        $('#shoprental_id').on('change',function(){
            var shoprental_id=$(this).val();

            if (shoprental_id!='') {
                $.get("{{concatenateLangToUrl('admin/getshoprentalinfos')}}"+'/'+shoprental_id,function(res){
                    var json=JSON.parse(res);   
                    document.getElementById("price").value=json['price'];
                    document.getElementById("area").value=json['area'];                    
                                        
                });                
            }
        });
</script>