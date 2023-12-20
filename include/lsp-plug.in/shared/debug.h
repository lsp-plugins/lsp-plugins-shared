/*
 * Copyright (C) 2023 Linux Studio Plugins Project <https://lsp-plug.in/>
 *           (C) 2023 Vladimir Sadovnikov <sadko4u@gmail.com>
 *
 * This file is part of lsp-plugins-clipper
 * Created on: 11 нояб. 2023 г.
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

#ifndef LSP_PLUG_IN_SHARED_DEBUG_H_
#define LSP_PLUG_IN_SHARED_DEBUG_H_

#include <lsp-plug.in/common/debug.h>
#include <lsp-plug.in/plug-fw/plug.h>

namespace lsp
{
    /**
     * Trace port identifier and return the port passed as an argument
     * @param p port to trace
     * @return the poointer to the port passed as an argument
     */
    static inline plug::IPort *trace_port(plug::IPort *p)
    {
        lsp_trace("  port id=%s", (p)->metadata()->id);
        return p;
    }
} /* namespace lsp */

#endif /* LSP_PLUG_IN_SHARED_DEBUG_H_ */
