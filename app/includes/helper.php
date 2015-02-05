<?php

# Write helper functions

function pwdcrypt($pwd)
{
	return sha1(sha1(sha1($pwd)));
}
