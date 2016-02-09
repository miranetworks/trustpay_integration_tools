server="10.0.1.80"
user="ubuntu"

until [ "$server" = "" ]; do

ssh $user@$server 'sudo rm -R /home/ubuntu/trustpay_integration_tools/*'

echo "Cleaned /home/ubuntu/trustpay_integration_tools"

scp -r /home/ec2-user/trustpay_integration_tools/current/ $user@$server:trustpay_integration_tools/
echo "copied * to " $user@$server



echo "Application Copied to  " $user@$server


ssh $user@$server 'sudo ./trustpay_integration_tools/current/install_local_server.sh'

echo "Installation Done on  " $user@$server

if [ "$server" = "10.0.1.80" ]; then
server=""
fi






done

echo "All servers done ... "

