#!/usr/bin/make -f
#
# Copyright (C) 2020 Linux Studio Plugins Project <https://lsp-plug.in/>
#           (C) 2020 Vladimir Sadovnikov <sadko4u@gmail.com>
#
# This file is part of lsp-plugins-shared
#
# lsp-plugins-shared is free software: you can redistribute it and/or modify
# it under the terms of the GNU Lesser General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# any later version.
#
# lsp-plugins-shared is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Lesser General Public License for more details.
#
# You should have received a copy of the GNU Lesser General Public License
# along with lsp-plugins-shared.  If not, see <https://www.gnu.org/licenses/>.
#

ifneq ($(VERBOSE),1)
.SILENT:
endif

DESTDIR        :=
ETCDIR         := /etc
SHAREDDIR      := /usr/local/share
FILES          :=

XDG_ICON_PATH   = $(DESTDIR)$(SHAREDDIR)/icons/hicolor
XDG_MENU_PATH   = $(DESTDIR)$(ETCDIR)/xdg/menus/applications-merged
XDG_APP_PATH    = $(DESTDIR)$(SHAREDDIR)/applications
XDG_DIR_PATH    = $(DESTDIR)$(SHAREDDIR)/desktop-directories
XDG_FILE_PATH   = $(foreach file,$(FILES),$(XDG_APP_PATH)/$(notdir $(file)))
XDG_FILE_LIST   = $(foreach file,$(FILES),\\<Filename\\>$(notdir $(file))\\<\\/Filename\\>\\n)

.PHONY: all install_xdg uninstall_xdg
.DEFAULT_TARGET=all

all:

install_xdg:
	mkdir -p "$(XDG_APP_PATH)"
	mkdir -p "$(XDG_DIR_PATH)"
	mkdir -p "$(XDG_MENU_PATH)"
	mkdir -p "$(XDG_ICON_PATH)/scalable/apps"
	mkdir -p "$(XDG_ICON_PATH)/16x16/apps"
	mkdir -p "$(XDG_ICON_PATH)/22x22/apps"
	mkdir -p "$(XDG_ICON_PATH)/24x24/apps"
	mkdir -p "$(XDG_ICON_PATH)/32x32/apps"
	mkdir -p "$(XDG_ICON_PATH)/48x48/apps"
	mkdir -p "$(XDG_ICON_PATH)/64x64/apps"
	mkdir -p "$(XDG_ICON_PATH)/128x128/apps"
	mkdir -p "$(XDG_ICON_PATH)/256x256/apps"
	cp -f icons/lsp-plugins/16x16.png    "$(XDG_ICON_PATH)/16x16/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/22x22.png    "$(XDG_ICON_PATH)/22x22/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/24x24.png    "$(XDG_ICON_PATH)/24x24/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/32x32.png    "$(XDG_ICON_PATH)/32x32/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/48x48.png    "$(XDG_ICON_PATH)/48x48/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/64x64.png    "$(XDG_ICON_PATH)/64x64/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/128x128.png  "$(XDG_ICON_PATH)/128x128/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/256x256.png  "$(XDG_ICON_PATH)/256x256/apps/lsp-plugins.png"
	cp -f icons/lsp-plugins/scalable.svg "$(XDG_ICON_PATH)/scalable/apps/lsp-plugins.svg"
	cp $(FILES) "$(XDG_APP_PATH)/"
	cp -f dirs/lsp-plugins.directory     "$(XDG_DIR_PATH)/lsp-plugins.directory"
	cat menus/lsp-plugins.menu | sed -E "s/<\\?filelist\\?>/$(XDG_FILE_LIST)/g" > "$(XDG_MENU_PATH)/lsp-plugins.menu"

uninstall_xdg:
	-rm -f $(XDG_FILE_PATH)
	-rm -f $(XDG_DIR_PATH)/lsp-plugins.directory
	-rm -f $(XDG_MENU_PATH)/lsp-plugins.menu
	-rm -f $(XDG_ICON_PATH)/16x16/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/22x22/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/24x24/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/32x32/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/48x48/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/64x64/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/128x128/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/256x256/apps/lsp-plugins.png
	-rm -f $(XDG_ICON_PATH)/scalable/apps/lsp-plugins.svg

