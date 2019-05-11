# *ctf readflag py版
from subprocess import *
p = Popen('/readflag', shell=True, stdin=PIPE, stdout=PIPE)
p.stdout.readline()
calc = p.stdout.readline()
print calc
answer = eval(calc)
junk = p.stdout.read(19)
p.stdin.write(str(answer)+"\n")
p.stdin.flush()
flag = p.stdout.readlines()
p.stdout.flush()
print flag