
/* 
  ================================================
  PVII Tree Menu Magic 3 scripts
  Copyright (c) 2013 Project Seven Development
  www.projectseven.com
  Version:  3.1.3 - build: 05
  ================================================
  
*/

// define the image swap file naming convention

// rollover image for any image in the normal state
var p7TM3over='_over';
// image for any trigger that has an open sub menu -no rollover
var p7TM3open='_down';

var p7TM3i=false,p7TM3a=false,p7TM3ctl=[],p7TM3adv=[],p7TM3dy=(1000/100);
function P7_TM3set(){
	var h,sh,hd,ie=P7_TM3getIEver();
	if(!document.getElementById){
		return;
	}
	sh='.p7TM3 ul div {height:0px;overflow:hidden;position:relative;display:none;}\n';
	sh+='.p7TM3 ul {overflow:hidden;}\n';
	sh+='.p7TM3toggle {display:block !important;}\n';
	if(document.styleSheets){
		if(ie>4 && ie<7){
			sh+='.p7TM3, .p7TM3 a, .p7TM3 li {height:1%;}\n';
		}
		if(ie>4 && ie<6){
			sh+='.p7TM3 a, .p7TM3 a {overflow:visible !important;}\n';
		}
		h='\n<st' + 'yle type="text/css">\n'+sh+'\n</s' + 'tyle>';
		document.write(h);
	}
	else{
		h=document.createElement('style');
		h.type='text/css';
		h.appendChild(document.createTextNode(sh));
		hd=document.getElementsByTagName('head');
		hd[0].appendChild(h);
	}
}
P7_TM3set();
function P7_TM3addLoad(){
	if(window.addEventListener){
		window.addEventListener("load",P7_TM3init,false);
		window.addEventListener("unload",P7_TM3bb,false);
	}
	else if(window.attachEvent){
		document.write("<script id=p7ie_tm3 defer src=\"//:\"><\/script>");
		document.getElementById("p7ie_tm3").onreadystatechange=function(){
			if (this.readyState=="complete"){
				if(p7TM3ctl.length>0){
					P7_TM3init();
				}
			}
		};
		window.attachEvent("onload",P7_TM3init);
	}
}
P7_TM3addLoad();
function P7_TM3bb(){
	return;
}
function P7_TM3op(){
	if(!document.getElementById){
		return;
	}
	p7TM3ctl[p7TM3ctl.length]=arguments;
}
function P7_TM3init(){
	var i,j,jj,k,tM,tA,tU,lv,pp,clv,fs,tS,d=1,cl,tp,uh=0,cN,tw,ow,oh,sP,cA,oA,tN,iM,tD,tB;
	if(p7TM3i){
		return;
	}
	p7TM3i=true;
	document.p7TM3preload=[];
	for(k=0;k<p7TM3ctl.length;k++){
		tM=document.getElementById(p7TM3ctl[k][0]);
		if(tM){
			tM.p7opt=p7TM3ctl[k];
			tM.style.position='relative';
			tM.style.overflow='hidden';
			tM.tm3Subs=[];
			tM.tm3StartTime=0;
			tM.tm3Duration=tM.p7opt[10];
			tM.tm3AnimType='quad';
			tM.p7TM3running=false;
			if(navigator.appVersion.indexOf("MSIE 5")>-1){
				tM.p7opt[1]=0;
			}
			tU=tM.getElementsByTagName('UL');
			tB=document.getElementById(tM.id.replace('_','tb_'));
			if(tB && tU[0]){
				tB.tm3Div=tM.id;
				tB.tm3UL=tU[0];
				cl=tU[0].className;
				if(cl && cl!=='' && cl.indexOf('opened')>-1){
					tB.tm3State='open';
					tU[0].tm3State='open';
				}
				else{
					P7_TM3remClass(tB,'closed');
					P7_TM3remClass(tU[0],'closed');
					tM.tm3ToolbarClosed=true;
					tB.tm3State='closed';
					tU[0].tm3State='closed';
				}
				tB.onclick=function(){
					var tB=this;
					var tU=this.tm3UL;
					if(tB.tm3State=='open'){
						tB.tm3State='closed';
						tU.tm3State='closed';
						P7_TM3remClass(tB,'opened');
						P7_TM3remClass(tU,'opened');
						P7_TM3setClass(tB,'closed');
						P7_TM3setClass(tU,'closed');
					}
					else{
						tB.tm3State='open';
						tU.tm3State='open';
						P7_TM3remClass(tB,'closed');
						P7_TM3remClass(tU,'closed');
						P7_TM3setClass(tB,'opened');
						P7_TM3setClass(tU,'opened');
					}
				};
				tA=tB.getElementsByTagName('A');
				if(tA && tA[0]){
					tA[0].onclick=function(){
						return false;
					};
				}
			}
			tD=tU[0].getElementsByTagName("DIV");
			for(i=0;i<tD.length;i++){
				tD[i].setAttribute("id",tM.id+'d'+(i+2));
				tD[i].tm3State='closed';
				tD[i].tm3Div=tM.id;
				tM.tm3Subs[tM.tm3Subs.length]=tD[i];
				tD[i].style.display='none';
				tD[i].style.height='0px';
			}
			tU=tM.getElementsByTagName("UL");
			for(i=0;i<tU.length;i++){
				tU[i].setAttribute("id",tM.id+'u'+(i+1));
				lv=1;
				pp=tU[i].parentNode;
				while(pp){
					if(pp.id&&pp.id==tM.id){
						break;
					}
					if(pp.tagName&&pp.tagName=="UL"){
						lv++;
					}
					pp=pp.parentNode;
				}
				tU[i].tm3Level=lv;
				clv='level_'+lv;
				P7_TM3setClass(tU[i],clv);
				tN=tU[i].childNodes;
				if(tN){
					fs=-1;
					jj=0;
					for(j=0;j<tN.length;j++){
						if(tN[j].tagName&&tN[j].tagName=="LI"){
							jj++;
							tA=tN[j].getElementsByTagName("A")[0];
							if(fs<0){
								P7_TM3setClass(tA,'tm3first');
								P7_TM3setClass(tN[j],'tm3first');
							}
							tN[j].tm3State='closed';
							fs=j;
							tA.setAttribute("id",tM.id+'a'+(d));
							tA.tm3Level=lv;
							tA.tm3Div=tM.id;
							if(i===0){
								P7_TM3setClass(tN[j],('root_'+jj));
							}
							tS=tN[j].getElementsByTagName("UL");
							if(tS&&tS.length>0){
								tA.tm3Sub=tS[0].parentNode.id;
								tA.tm3State="closed";
								P7_TM3setClass(tA,'trig_closed');
								P7_TM3setClass(tA.parentNode,'trig_closed');
								tA.onclick=function(){
									return P7_TM3trig(this);
								};
							}
							else{
								tA.tm3Sub=false;
								P7_TM3setClass(tA,'p7tm3_page');
								P7_TM3setClass(tA.parentNode,'p7tm3_page');
							}
							d++;
							tA.hasImg=false;
							var sr,x,swp,s1,s2,s3;
							iM=tA.getElementsByTagName("IMG");
							if(iM&&iM[0]){
								sr=iM[0].getAttribute("src");
								iM[0].tm3Swap=tM.p7opt[3];
								x=sr.lastIndexOf(".");
								s1=sr.substring(0,x)+p7TM3over+'.'+sr.substring(x+1);
								s2=sr.substring(0,x)+p7TM3open+'.'+sr.substring(x+1);
								if(iM[0].tm3Swap==1){
									iM[0].p7imgswap=[sr,s1,s1];
									P7_TM3preloader(s1);
								}
								else if (iM[0].tm3Swap==2){
									iM[0].p7imgswap=[sr,s1,s2];
									P7_TM3preloader(s1,s2);
								}
								else{
									iM[0].p7imgswap=[sr,sr,sr];
								}
								iM[0].tm3State='closed';
								iM[0].mark=false;
								iM[0].rollover=tM.p7opt[10];
								if(iM[0].tm3Swap>0){
									tA.hasImg=true;
									iM[0].onmouseover=function(){
										P7_TM3imovr(this);
									};
									iM[0].onmouseout=function(){
										P7_TM3imout(this);
									};
									tA.onfocus=function(){
										P7_TM3imovr(this.getElementsByTagName('IMG')[0]);
									};
									tA.onblur=function(){
										P7_TM3imout(this.getElementsByTagName('IMG')[0]);
									};
								}
							}
						}
					}
					if(fs>0){
						P7_TM3setClass(tA,'tm3last');
						P7_TM3setClass(tN[fs],'tm3last');
					}
				}
			}
			oA=document.getElementById(tM.id+'oa');
			if(oA){
				oA.onclick=function(){
					P7_TM3all(this.id.replace('oa',''),'open',0);
					return false;
				};
			}
			cA=document.getElementById(tM.id+'ca');
			if(cA){
				cA.onclick=function(){
					P7_TM3all(this.id.replace('ca',''),'close',0);
					return false;
				};
			}
			if(tM.p7opt[5]==1){
				P7_TM3currentMark(tM);
			}
			if(tM.p7opt[9]>-1){
				P7_TM3all(tM.id,'open',tM.p7opt[9]);
			}
			if(tM.tm3ToolbarClosed){
				tB=document.getElementById(tM.id.replace('_','tb_'));
				P7_TM3setClass(tB,'closed');
				P7_TM3setClass(tB.tm3UL,'closed');
			}
		}
	}
	p7TM3a=true;
}
function P7_TM3preloader(){
	var i,x;
	for(i=0;i<arguments.length;i++){
		x=document.p7TM3preload.length;
		document.p7TM3preload[x]=new Image();
		document.p7TM3preload[x].src=arguments[i];
	}
}
function P7_TM3imovr(im){
	var m=true;
	if(im.tm3State=='open' && im.rollover===0){
		m=false;
	}
	if(m){
		im.src=im.p7imgswap[1];
	}
}
function P7_TM3imout(im){
	if(im.tm3State=='open' || im.mark){
		im.src=im.p7imgswap[2];
	}
	else{
		im.src=im.p7imgswap[0];
	}
}
function P7_TM3trig(a){
	var wH,m=false;
	wH=window.location.href;
	if(a.href != wH && a.href != wH+'#'){
		if(a.href.toLowerCase().indexOf('java')==-1){
			m=true;
		}
	}
	if(m && a.tm3Sub && a.tm3State=='closed'){
		m=false;
	}
	if(a.tm3State=='closed'){
		P7_TM3open(a);
	}
	else{
		P7_TM3close(a);
	}
	return m;
}
function P7_TM3open(a,bp){
	var sP,tM,tD,iM,tw,v,tU,op=0;
	if(a.tm3State=='open'){
		return;
	}
	tM=document.getElementById(a.tm3Div);
	tD=document.getElementById(a.tm3Sub);
	if(!bp){
		if(tM.p7opt[8]==1){
			P7_TM3toggle(a);
		}
	}
	a.tm3State='open';
	a.parentNode.tm3State='open';
	tD.tm3State='open';
	if(a.hasImg){
		iM=a.getElementsByTagName("IMG")[0];
		iM.tm3State='open';
		iM.src=iM.p7imgswap[2];
	}
	sP=document.getElementById(a.tm3span);
	a.className=a.className.replace('trig_closed','trig_open');
	a.parentNode.className=a.parentNode.className.replace('trig_closed','trig_open');
	op=tM.p7opt[1];
	if(!bp&&p7TM3a&&op>0){
		if(op>0){
			tU=tD.getElementsByTagName('UL')[0];
			tM.p7animType='quad';
			tM.p7animProp='height';
			tM.p7animUnit='px';
			tD.style.display='block';
			tD.p7animStartVal=0;
			if(tD.tm3State=='open'){
				tD.p7animStartVal=tD.offsetHeight;
			}
			tD.p7animCurrentVal=tD.p7animStartVal;
			tD.p7animFinishVal=tU.offsetHeight;
			tD.style[tM.p7animProp]=tD.p7animCurrentVal+tM.p7animUnit;
			tM.p7animStartTime=P7_TM3getTime(0);
			tM.p7animDuration=tM.tm3Duration;
			if(!tM.p7TM3running){
				tM.p7TM3running=true;
				tM.p7TM3anim=setInterval("P7_TM3animator('"+tM.id+"',"+op+")",p7TM3dy);
			}
		}
	}
	else{
		tD.style.height='auto';
		tD.style.display='block';
	}
}
function P7_TM3close(a,bp){
	var sP,tM,tD,iM,op,tU;
	if(a.tm3State=='closed'){
		return;
	}
	tM=document.getElementById(a.tm3Div);
	op=tM.p7opt[1];
	tD=document.getElementById(a.tm3Sub);
	a.tm3State='closed';
	a.parentNode.tm3State='closed';
	if(a.hasImg){
		iM=a.getElementsByTagName("IMG")[0];
		iM.tm3State='closed';
		if(iM.mark){
			iM.src=iM.p7imgswap[1];
		}
		else{
			iM.src=iM.p7imgswap[0];
		}
	}
	sP=document.getElementById(a.tm3span);
	a.className=a.className.replace('trig_open','trig_closed');
	a.parentNode.className=a.parentNode.className.replace('trig_open','trig_closed');
	tD.tm3State='closed';
	if(!bp&&p7TM3a&&op>0){
		if(op>0){
			tU=tD.getElementsByTagName('UL')[0];
			tM.p7animType='quad';
			tM.p7animProp='height';
			tM.p7animUnit='px';
			tD.style.display='block';
			tD.p7animStartVal=tD.offsetHeight;
			tD.p7animCurrentVal=tD.p7animStartVal;
			tD.p7animFinishVal=0;
			tD.style[tM.p7animProp]=tD.p7animCurrentVal+tM.p7animUnit;
			tM.p7animStartTime=P7_TM3getTime(0);
			tM.p7animDuration=tM.tm3Duration;
			if(!tM.p7TM3running){
				tM.p7TM3running=true;
				tM.p7TM3anim=setInterval("P7_TM3animator('"+tM.id+"',"+op+")",p7TM3dy);
			}
		}
	}
	else{
		tD.style.height='0px';
		tD.style.display='none';
	}
}
function P7_TM3toggle(a,bp){
	var i,tC;
	tC=a.parentNode.parentNode.childNodes;
	for(i=0;i<tC.length;i++){
		if(tC[i].tagName&&tC[i].tagName=='LI'){
			if(tC[i].tm3State&&tC[i].tm3State=='open'&&tC[i]!=a.parentNode){
				P7_TM3close(tC[i].getElementsByTagName('A')[0]);
			}
		}
	}
}
function P7_TM3animator(d,op){
	var i,tB,tA,tS,et,nv,m=false;
	tB=document.getElementById(d);
	et=P7_TM3getTime(tB.p7animStartTime);
	if(et>=tB.p7animDuration){
		et=tB.p7animDuration;
	}
	tS=tB.tm3Subs;
	for(i=0;i<tS.length;i++){
		if(tS[i]){
			if(tS[i].p7animCurrentVal!=tS[i].p7animFinishVal){
				nv=P7_TM3anim(tB.p7animType,et,tS[i].p7animStartVal,tS[i].p7animFinishVal-tS[i].p7animStartVal,tB.p7animDuration);
				tS[i].p7animCurrentVal=nv;
				tS[i].style[tB.p7animProp]=nv+tB.p7animUnit;
				if(tS[i].p7animCurrentVal==tS[i].p7animFinishVal){
					if(tS[i].tm3State=='closed'){
						tB.tm3Subs[i].style.display='none';
						tB.tm3Subs[i].style.height='0px';
					}
					else{
						tB.tm3Subs[i].style.height='auto';
					}
				}
				else{
					m=true;
				}
			}
			else{
			}
		}
	}
	if(!m){
		tB.p7TM3running=false;
		clearInterval(tB.p7TM3anim);
	}
}
function P7_TM3getTime(st){
	var d = new Date();
	return d.getTime() - st;
}
function P7_TM3anim(tp,t,b,c,d){
	if(tp=='quad'){
		if((t/=d/2)<1){
			return c/2*t*t+b;
		}
		else{
			return -c/2*((--t)*(t-2)-1)+b;
		}
	}
	else{
		return (c*(t/d))+b;
	}
}
function P7_TM3all(d,ac,lv){
	var i,tM,tA;
	lv=(lv>0)?lv:0;
	tM=document.getElementById(d);
	if(tM){
		tA=tM.getElementsByTagName("A");
		for(i=0;i<tA.length;i++){
			if(tA[i].tm3Sub&&(lv===0||tA[i].tm3Level<=lv)){
				if(ac=='open'){
					if(tA[i].tm3State!='open'){
						P7_TM3open(tA[i],1);
					}
				}
				else{
					if(tA[i].tm3State!='closed'){
						P7_TM3close(tA[i],1);
					}
				}
			}
		}
	}
}
function P7_TM3mark(){
	p7TM3adv[p7TM3adv.length]=arguments;
}
function P7_TM3currentMark(el){
	var x,j,i,k,wH,cm=false,mt=['',1,'',''],op,r1,kk,tA,aU,pp,a,im;
	wH=window.location.href;
	if(el.p7opt[6]!=1){
		wH=wH.replace(window.location.search,'');
	}
	if(wH.charAt(wH.length-1)=='#'){
		wH=wH.substring(0,wH.length-1);
	}
	for(k=0;k<p7TM3adv.length;k++){
		if(p7TM3adv[k][0]&&p7TM3adv[k][0]==el.id){
			mt=p7TM3adv[k];
			cm=true;
			break;
		}
	}
	op=mt[1];
	if(op<1){
		return;
	}
	r1=/index\.[\S]*/i;
	k=-1;
	kk=-1;
	tA=el.getElementsByTagName("A");
	for(j=0;j<tA.length;j++){
		aU=tA[j].href.replace(r1,'');
		if(op>0){
			if(tA[j].href==wH||aU==wH){
				k=j;
				kk=-1;
			}
		}
		if(op==2){
			if(tA[j].firstChild){
				if(tA[j].firstChild.nodeValue==mt[2]){
					kk=j;
				}
			}
		}
		if(op==3&&tA[j].href.indexOf(mt[2])>-1){
			kk=j;
		}
		if(op==4){
			for(x=2;x<mt.length;x+=2){
				if(wH.indexOf(mt[x])>-1){
					if(tA[j].firstChild&&tA[j].firstChild.nodeValue){
						if(tA[j].firstChild.nodeValue==mt[x+1]){
							kk=j;
						}
					}
				}
			}
		}
	}
	k=(kk>k)?kk:k;
	if(k>-1){
		pp=tA[k].parentNode;
		while(pp){
			if(pp.tagName&&pp.tagName=='LI'){
				P7_TM3setClass(pp,'li_current_mark');
				a=pp.getElementsByTagName('A');
				if(a&&a[0]){
					P7_TM3setClass(a[0],'current_mark');
					if(a[0].hasImg){
						im=a[0].getElementsByTagName('IMG')[0];
						im.mark=true;
						im.src=im.p7imgswap[1];
					}
					if(a[0].tm3Sub){
						if(el.p7opt.length<12 || el.p7opt[11]==1){
							P7_TM3open(a[0],1);
						}
					}
				}
			}
			else{
				if(pp==el){
					break;
				}
			}
			pp=pp.parentNode;
		}
	}
}
function P7_TM3setClass(ob,cl){
	if(ob){
		var cc,nc,r=/\s+/g;
		cc=ob.className;
		nc=cl;
		if(cc&&cc.length>0){
			if(cc.indexOf(cl)==-1){
				nc=cc+' '+cl;
			}
			else{
				nc=cc;
			}
		}
		nc=nc.replace(r,' ');
		ob.className=nc;
	}
}
function P7_TM3remClass(ob,cl){
	if(ob){
		var cc,nc;
		cc=ob.className;
		if(cc&&cc.indexOf(cl>-1)){
			nc=cc.replace(cl,'');
			nc=nc.replace(/\s+/g,' ');
			nc=nc.replace(/\s$/,'');
			nc=nc.replace(/^\s/,'');
			ob.className=nc;
		}
	}
}
function P7_TM3getStyle(el,s1,s2){
	var s='';
	if(el.currentStyle){
		s=el.currentStyle[s1];
	}
	else{
		s=document.defaultView.getComputedStyle(el,"").getPropertyValue(s2);
	}
	return s;
}
function P7_TM3getIEver(){
	var j,v=-1,nv,m=false;
	nv=navigator.userAgent.toLowerCase();
	j=nv.indexOf("msie");
	if(j>-1){
		v=parseFloat(nv.substring(j+4,j+8));
		if(document.documentMode){
			v=document.documentMode;
		}
	}
	return v;
}
