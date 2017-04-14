        var fimo = 0;
	var semo = 0;
	var lfoo = '';
	var lsoo = '';
	var mu_path = '/test/inc/menu.php';
        
	$(document).ready(function(){		
		$('#topBlock').dynB({
			op:'#mco'
		});
		$('#topBlock_2').dynB({
			op:'#mco2'
		});			
	});
	function fmfo(_lsoo)
	{		
		if (semo)
		{
			$('#mco2').click();
			semo = 0;
			document.getElementById('sui'+lsoo).style.backgroundColor = "";
			document.getElementById('sui'+_lsoo).style.backgroundColor = "#ec5d0e";
			lfoo = '';			
			lsoo = _lsoo;
		}
		else
		{
			if ((lsoo == _lsoo))
			{
				document.getElementById('sui'+lsoo).style.backgroundColor = "";
				lsoo = '';				
				$('#mco').click();
			}
			else
			if (lsoo != "")
			{
				document.getElementById('sui'+lsoo).style.backgroundColor = "";
				document.getElementById('sui'+_lsoo).style.backgroundColor = "#ec5d0e";
				lsoo = _lsoo;
			}
			else
			if (lsoo == "")
			{
				$('#mco').click();
				lsoo = _lsoo;
				document.getElementById('sui'+lsoo).style.backgroundColor = "";
				document.getElementById('sui'+_lsoo).style.backgroundColor = "#ec5d0e";
			}
		}
		$.ajax({
                    type: 'POST',
                    data: 'sec_id=' +_lsoo+'&level=2',                     
                    url: mu_path,
                    success: function(data) {                            
                           $('#mcoi1').html(data);            
                        }
                });
	}
	function fmso(_lfoo)
        {
		if ((lfoo == _lfoo))
		{
			lfoo = '';
			$('#mco2').click();
			semo = 0;
		}
		else
		if (lfoo != '')
			lfoo = _lfoo;
		else
		if (lfoo == "")
		{
			$('#mco2').click();
			lfoo = _lfoo;
			semo = 1;
		}
                
		$.ajax({
                    type: 'POST',
                    data: 'sec_id=' +_lfoo+'&level=3',                     
                    url: mu_path,
                    success: function(data) {                            
                           $('#mcoi2').html(data);            
                        }
                }); 
	}

jQuery.fn.dynB = function(_opt){
	var _opt = jQuery.extend({
		op:'a',
		dr:200
	},_opt);
	return this.each(function(){
	var _obj = jQuery(this);
		var _dPr = parseInt(_obj.css('top'));
		var _op = jQuery(_opt.op, _obj);
		var _dr = _opt.dr;		
		
		_obj.addClass("bmDu")
		if (_opt.op) {
			_op.bind('click', function(){
				if (!_obj.hasClass('bmCu')){
					_obj.addClass('bmCu');
					_obj.removeClass("bmDu");
					eval('_obj.animate({top : 0}, '+_dr+', false)');
				} else {
					eval('_obj.animate({top : '+_dPr+'}, '+_dr+', false, function(){_obj.removeClass("bmCu"), _obj.addClass("bmDu")})');
				}
				return false; 
			});
		}
	});
}