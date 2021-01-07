import os


def rem(path, directory):
    for dirs in directory:
        temp = path + dirs
        for f in os.listdir(temp):
            os.remove(os.path.join(temp, f))


root = 'storage/app/public/'
dev_path = 'developer/'
client_path = 'client/'
dev_dir = ['profile']
client_dir = ['doc_img', 'profile', 'transaction']
rem(root + dev_path, dev_dir)
rem(root + client_path, client_dir)
