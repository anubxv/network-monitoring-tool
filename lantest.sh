#! /bin/bash
tcpdump ip -ne -c 3000 > packets
grep "TCP" packets > tcp
grep "UDP" packets > udp
grep "ARP" packets > arp

cut -d " " -f 1 arp > timestamparp
cut -d " " -f 12 arp > sourceiparp
cut -d " " -f 14 arp > diparp
cut -d "," -f 1 diparp > destinationiparp
cut -d " " -f 2 arp > sourcemacarp
cut -d " " -f 4 arp > dmacarp
cut -d "," -f 1 dmacarp > destinationmacarp
cut -d " " -f 15 arp > X1
grep -Eo '[0-9]{1,4}' X1 > plengtharp
cat sourceiparp | tr ' ' '\n' | sort | uniq -c | sort -nr | head -5 > toparp

cut -d " " -f 1 udp > timestampudp
cut -d " " -f 10 udp > sourceipudp
cut -d " " -f 12 udp > dipudp
cut -d "." -f 1 - 4 dipudp > destinationipudp
cut -d . -f 5 sourceipudp > sourceportudp
cut -d . -f 1 - 4 sourceipudp > sourceportudp
cut -d " " -f 2 udp > sourcemacudp
cut -d " " -f 4 udp > dmacudp
cut -d "," -f 1 dmacudp > destinationmacudp
cut -d " " -f 15 udp > X2
grep -Eo '[0-9]{1,4}' X2 > plengthudp
cat sourceipudp | tr ' ' '\n' | sort | uniq -c | sort -nr | head -5 > topudp

cut -d " " -f 1 tcp > timestamptcp
cut -d " " -f 2 tcp > sourcemactcp
cut -d " " -f 4 tcp > destinationmactcp
cut -d " " -f 10 tcp > sourceporttcp
cut -d " " -f 12 tcp > destinationporttcp
cut -d "." -f 1 - 4 sourceporttcp > sourceiptcp
cut -d "." -f 1 - 4 destinationporttcp > destinationiptcp
cut -d " " -f 15 tcp > X3
grep -Eo '[0-9]{1,4}' X3 > plengthtcp
cat sourceiptcp | tr ' ' '\n' | sort | uniq -c | sort -nr | head -5 > toptcp

