@echo off
if %1%==deploy (GOTO DEPLOY)
if %1%==redeploy (GOTO REDEPLOY)
:DONE
EXIT

:REDEPLOY
start /wait py auto/storage_fresh.py
start /wait php skripdown migrate:fresh --seed
start php skripdown serve
start ngrok http 127.0.0.1:8000
GOTO DONE

:DEPLOY
start php skripdown serve
start ngrok http 127.0.0.1:8000
GOTO DONE
