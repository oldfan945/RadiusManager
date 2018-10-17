<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadacctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared("CREATE TABLE radacct (
              radacctid bigint(21) NOT NULL auto_increment,
              acctsessionid varchar(64) NOT NULL default '',
              acctuniqueid varchar(32) NOT NULL default '',
              username varchar(64) NOT NULL default '',
              groupname varchar(64) NOT NULL default '',
              realm varchar(64) default '',
              nasipaddress varchar(15) NOT NULL default '',
              nasportid varchar(50) default NULL,
              nasporttype varchar(32) default NULL,
              acctstarttime datetime NULL default NULL,
              acctupdatetime datetime NULL default NULL,
              acctstoptime datetime NULL default NULL,
              acctinterval int(12) default NULL,
              acctsessiontime int(12) unsigned default NULL,
              acctauthentic varchar(32) default NULL,
              connectinfo_start varchar(50) default NULL,
              connectinfo_stop varchar(50) default NULL,
              acctinputoctets bigint(20) default NULL,
              acctoutputoctets bigint(20) default NULL,
              calledstationid varchar(50) NOT NULL default '',
              callingstationid varchar(50) NOT NULL default '',
              acctterminatecause varchar(32) NOT NULL default '',
              servicetype varchar(32) default NULL,
              framedprotocol varchar(32) default NULL,
              framedipaddress varchar(15) NOT NULL default '',
              framedipv6address varchar(44) NOT NULL default '',
              framedipv6prefix varchar(44) NOT NULL default '',
              framedinterfaceid varchar(44) NOT NULL default '',
              delegatedipv6prefix varchar(44) NOT NULL default '',
              PRIMARY KEY (radacctid),
              UNIQUE KEY acctuniqueid (acctuniqueid),
              KEY username (username),
              KEY framedipaddress (framedipaddress),
              KEY framedipv6address (framedipv6address),
              KEY framedipv6prefix (framedipv6prefix),
              KEY framedinterfaceid (framedinterfaceid),
              KEY delegatedipv6prefix (delegatedipv6prefix),
              KEY acctsessionid (acctsessionid),
              KEY acctsessiontime (acctsessiontime),
              KEY acctstarttime (acctstarttime),
              KEY acctinterval (acctinterval),
              KEY acctstoptime (acctstoptime),
              KEY nasipaddress (nasipaddress),
              INDEX bulk_close (acctstoptime, nasipaddress, acctstarttime)
            ) ENGINE = INNODB;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radacct');
    }
}
