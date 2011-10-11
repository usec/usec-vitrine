
import sys
import re
import md5

if len(sys.argv) < 6:
	print "%s <config-file> <login-admin> <pass-admin> <base-url> <root-dir>" % __file__
	sys.exit(1)

filename = sys.argv[1]
login = sys.argv[2]
password = sys.argv[3]
url = sys.argv[4]
root_dir = sys.argv[5]

print login, password, url, root_dir


f = open(filename)
s = f.read()
f.close()
s = re.sub(r'<login>.*</login>', r'<login>%s</login>' % md5.new(login).hexdigest(), s)
s = re.sub(r'<password>.*</password>', r'<password>%s</password>' % md5.new(password).hexdigest(), s)
s = re.sub(r'<baseurl>.*</baseurl>', r'<baseurl>%s</baseurl>' % url, s)
s = re.sub(r'<rootdir>.*</rootdir>', r'<rootdir>%s</rootdir>' % root_dir, s)
f = open(filename,"w")
f.write(s)
f.close()
