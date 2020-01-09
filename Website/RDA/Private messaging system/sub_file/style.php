html , body{height:100%; overflow:hidden; padding:0px; margin:0px;}
a, p{font-size:12px; font-family:helvetica;}
#container{box-shadow:2px 2px 10px #000000; width:1200px; height:90%;
            margin:2% auto; border-radius:1%;overflow:hidden;
            }
#menu {background:#233070; color:white; padding:2%; font-size:30px;}

#left-col,#right-col{position:relative; float:left; height:90%;}
#left-col{width:30%;}
#right-col{width:68%; border:1px solid #efefef;}

#left-col-container, #right-col-container {width:100%; height:100%; margin:0px auto; overflow:auto;}

.gray-back {border:1px solid black; padding:5px; background:#efefef; margin:0px auto;  margin-top:2px; overflow:auto; }
.image{float:left; margin-right:5px; width:50px; height:50px;}

#message-container {height:85%; overflow:auto;}
.textarea{ width:99%; height:10%; position:absolute; bottom:1%; margin:0px auto; }


.gray-message , .white-message{
    border:1px solid black;
    width:95%;
    padding:5px;
    margin:0px auto;
    margin-top:2px;
    overflow:auto;
}
.gray-message{
    background:#efefef;
}


#new-message{
    display:none;
    box-shadow:2px 10px 30px #000000; width:500px;
    position:fixed; top:20%;
    background:white;
    z-index:2;
    left:50%;
    transform:translate(-50%, 0);
    border-radius:5px;
    overflow:auto;
}
.m-header, .m-footer{background:#233070; margin:0px; color:white; padding:5px; }
.m-header{font-size:20px; text-align:center;}
.m-body{padding:5px;}
.message-input{width:95%;}