/*
 * Copyright (C) 2020 Linux Studio Plugins Project <https://lsp-plug.in/>
 *           (C) 2020 Vladimir Sadovnikov <sadko4u@gmail.com>
 *
 * This file is part of lsp-plugins-shared
 * Created on: 25 нояб. 2020 г.
 *
 * lsp-plugins-shared is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * lsp-plugins-shared is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with lsp-plugins-shared. If not, see <https://www.gnu.org/licenses/>.
 */

#ifndef LSP_PLUG_IN_SHARED_META_DEVELOPERS_H_
#define LSP_PLUG_IN_SHARED_META_DEVELOPERS_H_

#include <lsp-plug.in/shared/version.h>
#include <lsp-plug.in/plug-fw/meta/types.h>

#define LSP_LADSPA_BASE             0x4C5350
#define LSP_BASE_URI                "http://lsp-plug.in/"

#define LSP_LV2_URI(id)             LSP_BASE_URI "plugins/lv2/" id
#define LSP_LADSPA_URI(id)          LSP_BASE_URI "plugins/ladspa/" id
#define LSP_LV2UI_URI(id)           LSP_BASE_URI "ui/lv2/" id

namespace lsp
{
    namespace developers
    {
        extern const meta::person_t         v_sadovnikov;
        extern const meta::person_t         s_tronci;
    }
}


#endif /* LSP_PLUG_IN_SHARED_META_DEVELOPERS_H_ */
