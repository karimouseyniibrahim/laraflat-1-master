<script type="text/javascript">
        $('#formation_id').on('change',function(){
            var formation_id=$(this).val();

            if (formation_id!='') {
                $.get("{{concatenateLangToUrl('admin/getformationinfos')}}"+'/'+formation_id,function(res){
                    var json=JSON.parse(res);
                    document.getElementById("price").value=json['price'];
                    document.getElementById("places").value=json['places'];
                    document.getElementById("debut_formation").value=json['debut_formation'];
                    document.getElementById("fin_formation").value=json['fin_formation'];
                                   
                });                
            }
        });        
</script>